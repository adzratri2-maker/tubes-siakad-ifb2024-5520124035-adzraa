<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Jadwal;
use App\Models\Krs;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $data = [
                'total_dosen' => Dosen::count(),
                'total_mahasiswa' => Mahasiswa::count(),
                'total_matakuliah' => Matakuliah::count(),
                'total_jadwal' => Jadwal::count(),
            ];
            return view('dashboard.admin', $data);
        } else {
            $npm = auth()->user()->npm;
            $krs = Krs::with('matakuliah')->where('npm', $npm)->get();
            $jadwal = Jadwal::with(['matakuliah', 'dosen'])->get();
            return view('dashboard.mahasiswa', compact('krs', 'jadwal'));
        }
    }
}