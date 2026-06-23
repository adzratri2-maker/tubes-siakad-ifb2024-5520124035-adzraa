<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['matakuliah', 'dosen'])->get();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();
        return view('jadwal.create', compact('dosen', 'matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
            'nidn' => 'required|exists:dosen,nidn',
            'kelas' => 'required|string|max:1',
            'hari' => 'required|string',
            'jam' => 'required',
        ]);

        Jadwal::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();
        return view('jadwal.edit', compact('jadwal', 'dosen', 'matakuliah'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
            'nidn' => 'required|exists:dosen,nidn',
            'kelas' => 'required|string|max:1',
            'hari' => 'required|string',
            'jam' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil dihapus!');
    }
}