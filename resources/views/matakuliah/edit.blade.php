@extends('layouts.app')

@section('title', 'Edit Mata Kuliah')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h5 class="mb-0">Edit Mata Kuliah</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('matakuliah.update', $matakuliah->kode_matakuliah) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control" value="{{ $matakuliah->kode_matakuliah }}" disabled style="color: var(--text); background: var(--card-bg);">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Mata Kuliah</label>
                <input type="text" name="nama_matakuliah" class="form-control @error('nama_matakuliah') is-invalid @enderror"
                       value="{{ old('nama_matakuliah', $matakuliah->nama_matakuliah) }}" placeholder="Masukkan nama mata kuliah">
                @error('nama_matakuliah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">SKS</label>
                <input type="number" name="sks" class="form-control @error('sks') is-invalid @enderror"
                       value="{{ old('sks', $matakuliah->sks) }}" min="1" max="6">
                @error('sks')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection