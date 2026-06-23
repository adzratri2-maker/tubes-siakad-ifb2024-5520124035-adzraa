@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h5 class="mb-0">Tambah Jadwal</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Mata Kuliah</label>
                <select name="kode_matakuliah" class="form-select @error('kode_matakuliah') is-invalid @enderror">
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($matakuliah as $m)
                    <option value="{{ $m->kode_matakuliah }}" {{ old('kode_matakuliah') == $m->kode_matakuliah ? 'selected' : '' }}>
                        {{ $m->nama_matakuliah }}
                    </option>
                    @endforeach
                </select>
                @error('kode_matakuliah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Dosen</label>
                <select name="nidn" class="form-select @error('nidn') is-invalid @enderror">
                    <option value="">-- Pilih Dosen --</option>
                    @foreach($dosen as $d)
                    <option value="{{ $d->nidn }}" {{ old('nidn') == $d->nidn ? 'selected' : '' }}>
                        {{ $d->nama }}
                    </option>
                    @endforeach
                </select>
                @error('nidn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select name="kelas" class="form-select @error('kelas') is-invalid @enderror">
                    <option value="">-- Pilih Kelas --</option>
                    <option value="A" {{ old('kelas') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('kelas') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('kelas') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('kelas') == 'D' ? 'selected' : '' }}>D</option>
                </select>
                @error('kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Hari</label>
                <select name="hari" class="form-select @error('hari') is-invalid @enderror">
                    <option value="">-- Pilih Hari --</option>
                    <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                </select>
                @error('hari')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jam</label>
                <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror"
                       value="{{ old('jam') }}">
                @error('jam')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection