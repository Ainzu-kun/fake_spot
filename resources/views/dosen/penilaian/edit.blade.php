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
    <h2>Edit nilai mahasiswa {{ $penilaian->studies->mahasiswa->nama }}!</h2>
    <h4>Isi setiap nilai dari 0 sampai 100!</h4>
    <form action="{{ route('penilaian.update', ['dosen_id' => $dosen_id, 'penilaian_id' => $penilaian->id]) }}" method="post">
        @csrf
        <label for="point">Point: </label>
        <input type="number" name="point" id="point" value="{{ $penilaian->point }}" min="0" max="100" required>
        @error('point')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="tugas">Tugas: </label>
        <input type="number" name="tugas" id="tugas" value="{{ $penilaian->tugas }}" min="0" max="100" required>
        @error('tugas')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="pre_uts">Pre UTS: </label>
        <input type="number" name="pre_uts" id="pre_uts" value="{{ $penilaian->pre_uts }}" min="0" max="100" required>
        @error('pre_uts')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="kuis_1">Kuis 1: </label>
        <input type="number" name="kuis_1" id="kuis_1" value="{{ $penilaian->kuis_1 }}" min="0" max="100" required>
        @error('kuis_1')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="uts">UTS: </label>
        <input type="number" name="uts" id="uts" value="{{ $penilaian->uts }}" min="0" max="100" required>
        @error('uts')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="pre_uas">Pre UAS: </label>
        <input type="number" name="pre_uas" id="pre_uas" value="{{ $penilaian->pre_uas }}" min="0" max="100" required>
        @error('pre_uas')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="kuis_2">Kuis 2: </label>
        <input type="number" name="kuis_2" id="kuis_2" value="{{ $penilaian->kuis_2 }}" min="0" max="100" required>
        @error('kuis_2')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="uas">UAS: </label>
        <input type="number" name="uas" id="uas" value="{{ $penilaian->uas }}" min="0" max="100" required>
        @error('uas')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="preview">Preview rata-rata nilai: </label>
        <input type="number" id="preview" readonly>
        <br><br>
        <button type="submit">Edit nilai mahasiswa</button>
    </form>
    <br>
    <a href="{{ url()->previous() }}">Kembali</a>

    <script>
        const fields = ['point', 'tugas', 'pre_uts', 'kuis_1', 'uts', 'pre_uas', 'kuis_2', 'uas'];
        const preview = document.getElementById('preview');

        function updatePreview() {
            let total = 0;
            let count = 0;

            fields.forEach(id => {
                const input = document.getElementById(id);
                const value = parseFloat(input.value);
                if (!isNaN(value)) {
                    total += value;
                    count++;
                }
            });

            preview.value = count ? (total / count).toFixed(2) : '';
        }

        // Jalankan saat nilai berubah
        fields.forEach(id => {
            const input = document.getElementById(id);
            input.addEventListener('input', updatePreview);
        });

        // Jalankan saat pertama kali halaman dimuat
        updatePreview();
    </script>
</body>
</html>
