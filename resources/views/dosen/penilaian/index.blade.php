<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fake Spot</title>

    <link rel="shortcut icon" href="{{ asset('assets/icon/upi.png') }}" type="image/x-icon">
</head>
<body>
    <h2>Daftar Nilai Mahasiswa</h2>
    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Point</th>
            <th>Tugas</th>
            <th>Pre UTS</th>
            <th>Kuis 1</th>
            <th>UTS</th>
            <th>Pre UAS</th>
            <th>Kuis 2</th>
            <th>UAS</th>
            <th>Rata-rata</th>
            <th>IPK</th>
            <th>Grade</th>
            <th>Action</th>
        </tr>
        @foreach ($penilaians as $penilaian)

            {{-- count avg --}}
            @php
                $nilai = [
                    $penilaian->point,
                    $penilaian->tugas,
                    $penilaian->pre_uts,
                    $penilaian->kuis_1,
                    $penilaian->uts,
                    $penilaian->pre_uas,
                    $penilaian->kuis_2,
                    $penilaian->uas,
                ];

                $avg = array_sum($nilai) / count($nilai);
            @endphp

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $penilaian->studies->mahasiswa->nim }}</td>
                <td>{{ $penilaian->studies->mahasiswa->nama }}</td>
                <td>{{ $penilaian->point }}</td>
                <td>{{ $penilaian->tugas }}</td>
                <td>{{ $penilaian->pre_uts }}</td>
                <td>{{ $penilaian->kuis_1 }}</td>
                <td>{{ $penilaian->uts }}</td>
                <td>{{ $penilaian->pre_uas }}</td>
                <td>{{ $penilaian->kuis_2 }}</td>
                <td>{{ $penilaian->uas }}</td>
                <td>{{ number_format($avg, 2) }}</td>
                <td>{{ $penilaian->IPK }}</td>
                <td>{{ $penilaian->grade }}</td>
                <td>
                    <a href="{{ route('penilaian.edit', ['dosen_id' => $dosen_id, 'penilaian_id' => $penilaian->id]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        @empty($penilaian)
            <tr>
                <td colspan="100%" style="text-align: center;">Tidak ada data</td>
            </tr>
        @endempty
    </table>
    <br>
    <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen_id]) }}">Kembali</a>
</body>
</html>
