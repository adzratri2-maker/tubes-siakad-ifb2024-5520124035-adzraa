<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KRS - {{ $mahasiswa->npm }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; color: #000; margin: 30px; }
        .header { text-align: center; margin-bottom: 16px; }
        .header h2 { font-size: 15px; font-weight: bold; text-decoration: underline; margin: 0 0 12px 0; letter-spacing: 1px; }
        .info-table { width: 100%; margin-bottom: 16px; }
        .info-table td { padding: 2px 4px; font-size: 11px; width: 25%; }
        .info-table td.label { font-weight: normal; width: 18%; }
        .info-table td.colon { width: 2%; }
        .info-table td.value { width: 30%; }
        table.krs-table { width: 100%; border-collapse: collapse; margin-top: 6px; }
        table.krs-table th, table.krs-table td { border: 1px solid #000; padding: 5px 7px; text-align: left; font-size: 11px; }
        table.krs-table th { text-align: center; font-weight: bold; background: #fff; }
        table.krs-table td.center { text-align: center; }
        .total-row td { font-weight: bold; text-align: center; }
        .ttd { margin-top: 40px; display: table; width: 100%; }
        .ttd-box { display: table-cell; width: 33%; text-align: center; font-size: 11px; }
        .ttd-space { height: 60px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>KARTU RENCANA STUDI</h2>
    </div>

    <table class="info-table">
        <tr>
            <td class="label">Nama Mahasiswa</td>
            <td class="colon">:</td>
            <td class="value">{{ $mahasiswa->nama }}</td>
            <td class="label">No. Induk Mahasiswa</td>
            <td class="colon">:</td>
            <td class="value">{{ $mahasiswa->npm }}</td>
        </tr>
        <tr>
            <td class="label">Kelas</td>
            <td class="colon">:</td>
            <td class="value">IF B 2024</td>
            <td class="label">Semester</td>
            <td class="colon">:</td>
            <td class="value">Genap</td>
        </tr>
        <tr>
            <td class="label">Program Studi</td>
            <td class="colon">:</td>
            <td class="value">Teknik Informatika</td>
            <td class="label">Tahun Akademik</td>
            <td class="colon">:</td>
            <td class="value">{{ date('Y') }}/{{ date('Y') + 1 }}</td>
        </tr>
    </table>

    <table class="krs-table">
        <thead>
            <tr>
                <th style="width:5%;">No. Urut</th>
                <th style="width:35%;">Mata Kuliah</th>
                <th style="width:12%;">Kode MK</th>
                <th style="width:8%;">SKS</th>
                <th style="width:35%;">Dosen Pengampu</th>
                <th style="width:5%;">Ket</th>
            </tr>
        </thead>
        <tbody>
            @forelse($krs as $key => $k)
            <tr>
                <td class="center">{{ $key + 1 }}</td>
                <td>{{ strtoupper($k->matakuliah->nama_matakuliah) }}</td>
                <td class="center">{{ $k->matakuliah->kode_matakuliah }}</td>
                <td class="center">{{ $k->matakuliah->sks }}</td>
                <td>
                    @if($k->matakuliah->jadwal->first())
                        {{ $k->matakuliah->jadwal->first()->dosen->nama ?? '-' }}
                    @else
                        -
                    @endif
                </td>
                <td></td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="center">Belum ada mata kuliah</td>
            </tr>
            @endforelse
            <tr class="total-row">
                <td colspan="3" style="text-align:right; font-weight:bold;">Jumlah SKS Diambil</td>
                <td class="center">{{ $krs->sum('matakuliah.sks') }}</td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>

    <div class="ttd">
        <div class="ttd-box">
            <p>Mengetahui,<br>Dosen Wali</p>
            <div class="ttd-space"></div>
            <p>(................................)</p>
        </div>
        <div class="ttd-box">
            <p>Menyetujui,<br>Ketua Program Studi</p>
            <div class="ttd-space"></div>
            <p>(................................)</p>
        </div>
        <div class="ttd-box">
            <p>{{ now()->format('d F Y') }},<br>Mahasiswa</p>
            <div class="ttd-space"></div>
            <p>( {{ $mahasiswa->nama }} )</p>
        </div>
    </div>
</body>
</html>