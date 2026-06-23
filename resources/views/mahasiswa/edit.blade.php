@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h5 class="mb-0">Edit Mahasiswa</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('mahasiswa.update', $mahasiswa->npm) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">NPM</label>
                <input type="text" class="form-control" value="{{ $mahasiswa->npm }}" disabled style="color: var(--text); background: var(--card-bg);">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama', $mahasiswa->nama) }}" placeholder="Masukkan nama mahasiswa">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection