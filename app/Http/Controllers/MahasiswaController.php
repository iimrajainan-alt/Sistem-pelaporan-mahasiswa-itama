<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    
    public function index()
    {
        $mahasiswas = \App\Models\Mahasiswa::orderBy('nama')->paginate(10);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'nama' => ['required','string','max:100'],
            'nim'  => ['required','string','max:20','unique:mahasiswas,nim'],
            'email'=> ['required','email','max:100','unique:mahasiswas,email'],
        ]);

        \App\Models\Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success','Data mahasiswa berhasil ditambahkan.');
    }
    public function show(\App\Models\Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(\App\Models\Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nama' => ['required','string','max:100'],
            'nim'  => ['required','string','max:20','unique:mahasiswas,nim,'.$mahasiswa->id],
            'email'=> ['required','email','max:100','unique:mahasiswas,email,'.$mahasiswa->id],
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success','Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success','Data mahasiswa berhasil dihapus.');
    }
}
