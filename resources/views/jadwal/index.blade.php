@extends('layouts.app')

@section('title', 'Data Jadwal')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Jadwal Perkuliahan</h5>
        @if(auth()->user()->isAdmin())
        <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Jadwal
        </a>
        @endif
    </div>
    <div class="card-body">
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari mata kuliah, dosen, hari..." style="max-width: 300px; color: var(--text); background: var(--card-bg); border-color: var(--border);">
        </div>
        <table class="table table-bordered table-hover" id="jadwalTable">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    @if(auth()->user()->isAdmin())
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($jadwal as $key => $j)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $j->matakuliah->nama_matakuliah }}</td>
                    <td>{{ $j->dosen->nama }}</td>
                    <td>{{ $j->kelas }}</td>
                    <td>{{ $j->hari }}</td>
                    <td>{{ $j->jam }}</td>
                    @if(auth()->user()->isAdmin())
                    <td>
                        <a href="{{ route('jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center" style="color: var(--text-muted);">Belum ada data jadwal</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#jadwalTable tbody tr');
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
@endsection