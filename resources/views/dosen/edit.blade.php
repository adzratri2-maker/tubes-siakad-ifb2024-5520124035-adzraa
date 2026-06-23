@extends('layouts.app')

@section('title', 'Edit Dosen')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h5 class="mb-0">Edit Dosen</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dosen.update', $dosen->nidn) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">NIDN</label>
                <input type="text" class="form-control" value="{{ $dosen->nidn }}" disabled style="color: var(--text); background: var(--card-bg);">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Dosen</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama', $dosen->nama) }}" placeholder="Masukkan nama dosen">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection