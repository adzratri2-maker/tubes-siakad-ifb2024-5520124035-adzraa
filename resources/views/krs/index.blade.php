@extends('layouts.app')

@section('title', 'KRS Saya')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Kartu Rencana Studi (KRS)</h5>
    <div class="d-flex gap-2">
        <a href="{{ route('krs.export-pdf') }}" class="btn btn-danger btn-sm">
            <i class="fas fa-file-pdf"></i> Export PDF
        </a>
        <a href="{{ route('krs.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Ambil Mata Kuliah
        </a>
    </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($krs as $key => $k)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $k->matakuliah->kode_matakuliah }}</td>
                    <td>{{ $k->matakuliah->nama_matakuliah }}</td>
                    <td>{{ $k->matakuliah->sks }}</td>
                    <td>
                        <form action="{{ route('krs.destroy', $k->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin drop mata kuliah ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Drop
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center" style="color: var(--text-muted);">Belum ada mata kuliah yang diambil</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if($krs->count() > 0)
        <div class="mt-3">
            <strong style="color: var(--text);">Total SKS: {{ $krs->sum('matakuliah.sks') }}</strong>
        </div>
        @endif
    </div>
</div>
@endsection