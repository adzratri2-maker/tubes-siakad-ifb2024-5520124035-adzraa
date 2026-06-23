@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="row g-4">
    <div class="col-md-3">
        <a href="{{ route('dosen.index') }}" style="text-decoration:none;">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6>Total Dosen</h6>
                            <h2>{{ $total_dosen }}</h2>
                        </div>
                        <i class="fas fa-chalkboard-teacher fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('mahasiswa.index') }}" style="text-decoration:none;">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6>Total Mahasiswa</h6>
                            <h2>{{ $total_mahasiswa }}</h2>
                        </div>
                        <i class="fas fa-user-graduate fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('matakuliah.index') }}" style="text-decoration:none;">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6>Total Mata Kuliah</h6>
                            <h2>{{ $total_matakuliah }}</h2>
                        </div>
                        <i class="fas fa-book fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('jadwal.index') }}" style="text-decoration:none;">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6>Total Jadwal</h6>
                            <h2>{{ $total_jadwal }}</h2>
                        </div>
                        <i class="fas fa-calendar fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body text-center" style="padding: 60px 20px;">
                <h5 style="color:var(--text); font-weight:600;">Selamat Datang, {{ auth()->user()->name }}! 👋</h5>
                <p style="color:var(--text-muted); margin:0;">Gunakan menu di sidebar untuk mengelola data SIAKAD.</p>
            </div>
        </div>
    </div>
</div>
@endsection