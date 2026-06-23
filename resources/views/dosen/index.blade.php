@extends('layouts.app')

@section('title', 'Data Dosen')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Dosen</h5>
        <a href="{{ route('dosen.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Dosen
        </a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari nama atau NIDN dosen..." style="max-width: 300px;">
        </div>
        <table class="table table-bordered table-hover" id="dosenTable">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dosen as $key => $d)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $d->nidn }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>
                        <a href="{{ route('dosen.edit', $d->nidn) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('dosen.destroy', $d->nidn) }}" method="POST" class="d-inline"
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
                    <td colspan="4" class="text-center" style="color: var(--text-muted);">Belum ada data dosen</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#dosenTable tbody tr');
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
@endsection