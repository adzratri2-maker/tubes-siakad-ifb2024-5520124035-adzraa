@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h5 class="mb-0">Tambah Mata Kuliah</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('matakuliah.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kode Mata Kuliah</label>
                <input type="text" name="kode_matakuliah" class="form-control @error('kode_matakuliah') is-invalid @enderror"
                       value="{{ old('kode_matakuliah') }}" placeholder="Contoh: IF001">
                @error('kode_matakuliah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Mata Kuliah</label>
                <input type="text" name="nama_matakuliah" class="form-control @error('nama_matakuliah') is-invalid @enderror"
                       value="{{ old('nama_matakuliah') }}" placeholder="Masukkan nama mata kuliah">
                @error('nama_matakuliah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">SKS</label>
                <input type="number" name="sks" class="form-control @error('sks') is-invalid @enderror"
                       value="{{ old('sks') }}" placeholder="Masukkan jumlah SKS" min="1" max="6">
                @error('sks')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection