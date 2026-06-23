<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Matakuliah;
use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $npm = auth()->user()->npm;
        $krs = Krs::with('matakuliah')->where('npm', $npm)->get();
        return view('krs.index', compact('krs'));
    }

    public function create()
    {
        $npm = auth()->user()->npm;
        $sudahAmbil = Krs::where('npm', $npm)->pluck('kode_matakuliah');
        $matakuliah = Matakuliah::whereNotIn('kode_matakuliah', $sudahAmbil)->get();
        return view('krs.create', compact('matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
        ]);

        $npm = auth()->user()->npm;

        $exists = Krs::where('npm', $npm)
            ->where('kode_matakuliah', $request->kode_matakuliah)
            ->exists();

        if ($exists) {
            return redirect()->route('krs.index')->with('error', 'Mata kuliah sudah diambil!');
        }

        Krs::create([
            'npm' => $npm,
            'kode_matakuliah' => $request->kode_matakuliah,
        ]);

        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil diambil!');
    }

    public function destroy(string $id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();
        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil di-drop!');
    }

    public function exportPdf()
    {
    $npm = auth()->user()->npm;
    $mahasiswa = \App\Models\Mahasiswa::where('npm', $npm)->first();
    $krs = Krs::with('matakuliah')->where('npm', $npm)->get();
    $pdf = Pdf::loadView('krs.pdf', compact('krs', 'mahasiswa'));
    return $pdf->download('KRS-' . $npm . '.pdf');
    }
}