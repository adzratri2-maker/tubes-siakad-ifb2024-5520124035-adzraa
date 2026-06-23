@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Mahasiswa</h5>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Mahasiswa
        </a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari nama atau NPM mahasiswa..." style="max-width: 300px;">
        </div>
        <table class="table table-bordered table-hover" id="mahasiswaTable">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswa as $key => $m)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $m->npm }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $m->npm) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('mahasiswa.destroy', $m->npm) }}" method="POST" class="d-inline"
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
                    <td colspan="4" class="text-center" style="color: var(--text-muted);">Belum ada data mahasiswa</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#mahasiswaTable tbody tr');
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
@endsection