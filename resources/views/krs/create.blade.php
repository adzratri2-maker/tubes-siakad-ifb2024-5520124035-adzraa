@extends('layouts.app')

@section('title', 'Ambil Mata Kuliah')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h5 class="mb-0">Ambil Mata Kuliah</h5>
    </div>
    <div class="card-body">
        @if($matakuliah->isEmpty())
            <p style="color: var(--text-muted);">Semua mata kuliah sudah diambil.</p>
            <a href="{{ route('krs.index') }}" class="btn btn-secondary">Kembali</a>
        @else
        <form action="{{ route('krs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Pilih Mata Kuliah</label>
                <select name="kode_matakuliah" class="form-select @error('kode_matakuliah') is-invalid @enderror">
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($matakuliah as $m)
                    <option value="{{ $m->kode_matakuliah }}" {{ old('kode_matakuliah') == $m->kode_matakuliah ? 'selected' : '' }}>
                        {{ $m->nama_matakuliah }} ({{ $m->sks }} SKS)
                    </option>
                    @endforeach
                </select>
                @error('kode_matakuliah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('krs.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Ambil</button>
        </form>
        @endif
    </div>
</div>
@endsection