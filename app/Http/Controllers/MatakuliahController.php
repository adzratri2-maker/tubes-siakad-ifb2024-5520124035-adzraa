<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|string|max:8|unique:matakuliah',
            'nama_matakuliah' => 'required|string|max:50',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        Matakuliah::create($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_matakuliah' => 'required|string|max:50',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->update($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil dihapus!');
    }
}