@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Mata Kuliah</h5>
        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Mata Kuliah
        </a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari kode atau nama mata kuliah..." style="max-width: 300px;">
        </div>
        <table class="table table-bordered table-hover" id="matakuliahTable">
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
                @forelse($matakuliah as $key => $m)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $m->kode_matakuliah }}</td>
                    <td>{{ $m->nama_matakuliah }}</td>
                    <td>{{ $m->sks }}</td>
                    <td>
                        <a href="{{ route('matakuliah.edit', $m->kode_matakuliah) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('matakuliah.destroy', $m->kode_matakuliah) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center" style="color: var(--text-muted);">Belum ada data mata kuliah</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#matakuliahTable tbody tr');
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
@endsection