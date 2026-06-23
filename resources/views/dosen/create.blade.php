@extends('layouts.app')

@section('title', 'Tambah Dosen')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h5 class="mb-0">Tambah Dosen</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dosen.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">NIDN</label>
                <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror"
                       value="{{ old('nidn') }}" placeholder="Masukkan NIDN">
                @error('nidn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Dosen</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama') }}" placeholder="Masukkan nama dosen">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection