@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="mb-0" style="color: var(--text);">Edit Profil</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    @if($user->foto)
                        <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil"
                             style="width:100px; height:100px; border-radius:50%; object-fit:cover; border: 3px solid var(--border);">
                    @else
                        <div style="width:100px; height:100px; border-radius:50%; background:#2c3e50; display:inline-flex; align-items:center; justify-content:center; font-size:2.5rem; color:white; border: 3px solid var(--border);">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password Baru <span style="color:var(--text-muted); font-size:0.78rem;">(kosongkan jika tidak ingin ganti)</span></label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="Password baru">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Konfirmasi password baru">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection