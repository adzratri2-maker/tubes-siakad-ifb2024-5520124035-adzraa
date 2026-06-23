@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <a href="{{ route('krs.index') }}" style="text-decoration:none;">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6>Total SKS Diambil</h6>
                            <h2>{{ $krs->sum('matakuliah.sks') }}</h2>
                        </div>
                        <i class="fas fa-book fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('krs.index') }}" style="text-decoration:none;">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6>Total Mata Kuliah</h6>
                            <h2>{{ $krs->count() }}</h2>
                        </div>
                        <i class="fas fa-list fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="mb-0" style="color: var(--text);">KRS Saya</h5>
            </div>
            <div class="card-body">
                @if($krs->isEmpty())
                    <p style="color: var(--text-muted);">Belum ada mata kuliah yang diambil.</p>
                    <a href="{{ route('krs.create') }}" class="btn btn-primary">Ambil Mata Kuliah</a>
                @else
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Kode</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($krs as $item)
                            <tr>
                                <td>{{ $item->matakuliah->kode_matakuliah }}</td>
                                <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                                <td>{{ $item->matakuliah->sks }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection