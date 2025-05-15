<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Student Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Orbitron:wght@700&display=swap"
        rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/icon/upi.png') }}" type="image/x-icon">
    <style>
        .font-Inter {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="font-Inter">
    <div>
        <header class="bg-black flex justify-between items-center px-6 py-4 mb-6">
            <div class="flex items-center space-x-1">
                <span class="font-orbitron text-red-600 text-xl font-extrabold italic select-none">FAKE</span>
                <span
                    class="font-orbitron text-red-600 text-xl font-extrabold italic border border-red-600 rounded-md px-2 py-[2px] select-none">SPOT</span>
            </div>
            <div class="flex items-center space-x-8">
                <nav class="flex items-center space-x-8 text-gray-400 text-sm font-normal">
                    <a class="hover:text-white" href="#">Dashboard</a>
                    <a class="font-semibold text-white" href="#">Students</a>
                    <a class="hover:text-white" href="#">Evaluation</a>
                </nav>
                <a href="{{ route('auth.logout') }}">
                    <button class="bg-red-900 hover:bg-red-800 text-white text-sm font-semibold rounded-md px-4 py-2"
                        type="button">
                        <i class="fas fa-power-off me-0"></i> <span>Logout</span>
                    </button>
                </a>
            </div>
        </header>

        <main class="bg-white mt-6 rounded-md p-6">
            <button
                class="flex items-center space-x-2 border border-gray-700 rounded-md px-4 py-2 text-sm text-black mb-6"
                type="button">
                <a href="#" class="flex items-center space-x-2">
                    <i class="fas fa-arrow-left"></i> <span>Back</span>
                </a>
            </button>

            <section class="max-w-md mx-auto bg-white rounded-xl shadow-lg p-8"
                style="box-shadow: 0 4px 10px rgb(0 0 0 / 0.1)">
                <h1 class="text-center text-4xl font-extrabold mb-6">Edit Student Value</h1>
                <h2 class="text-center text-2xl font-semibold mb-6">{{ $penilaian->studies->mahasiswa->nama }}</h2>
                <h4 class="text-center text-sm font-semibold mb-6 text-gray:400">Fill in each value from 0 to 100!</h4>

                <form
                    action="{{ route('penilaian.update', ['dosen_id' => $dosen_id, 'penilaian_id' => $penilaian->id]) }}"
                    method="POST" class="space-y-6">
                    @csrf
                    <div class="mb-4">
                        <label for="point" class="block text-sm font-semibold mb-1">Point</label>
                        <input type="number" name="point" id="point"
                            value="{{ old('point', $penilaian->point) !== null ? old('point', $penilaian->point) : '' }}"
                            min="0" max="100" required
                            class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm placeholder-gray-400 text-gray-400 focus:text-black focus:outline-none focus:ring-1 focus:ring-black"
                            placeholder="Input point" />
                        @error('point')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tugas" class="block text-sm font-semibold mb-1">Task</label>
                        <input type="number" name="tugas" id="tugas"
                            value="{{ old('tugas', $penilaian->tugas) !== null ? old('tugas', $penilaian->tugas) : '' }}"
                            min="0" max="100" required
                            class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm placeholder-gray-400 text-gray-400 focus:text-black focus:outline-none focus:ring-1 focus:ring-black"
                            placeholder="Input task" />
                        @error('tugas')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pre_uts" class="block text-sm font-semibold mb-1">Pre-UTS</label>
                        <input type="number" name="pre_uts" id="pre_uts"
                            value="{{ old('pre_uts', $penilaian->pre_uts) !== null ? old('pre_uts', $penilaian->pre_uts) : '' }}"
                            min="0" max="100" required
                            class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm placeholder-gray-400 text-gray-400 focus:text-black focus:outline-none focus:ring-1 focus:ring-black"
                            placeholder="Input pre-UTS" />
                        @error('pre_uts')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kuis_1" class="block text-sm font-semibold mb-1">Quiz-1</label>
                        <input type="number" name="kuis_1" id="kuis_1"
                            value="{{ old('kuis_1', $penilaian->kuis_1) !== null ? old('kuis_1', $penilaian->kuis_1) : '' }}"
                            min="0" max="100" required
                            class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm placeholder-gray-400 text-gray-400 focus:text-black focus:outline-none focus:ring-1 focus:ring-black"
                            placeholder="Input quiz-1" />
                        @error('kuis_1')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="uts" class="block text-sm font-semibold mb-1">UTS</label>
                        <input type="number" name="uts" id="uts"
                            value="{{ old('uts', $penilaian->uts) !== null ? old('uts', $penilaian->uts) : '' }}"
                            min="0" max="100" required
                            class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm placeholder-gray-400 text-gray-400 focus:text-black focus:outline-none focus:ring-1 focus:ring-black"
                            placeholder="Input UTS" />
                        @error('uts')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pre_uas" class="block text-sm font-semibold mb-1">Pre UAS</label>
                        <input type="number" name="pre_uas" id="pre_uas"
                            value="{{ old('pre_uas', $penilaian->pre_uas) !== null ? old('pre_uas', $penilaian->pre_uas) : '' }}"
                            min="0" max="100" required
                            class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm placeholder-gray-400 text-gray-400 focus:text-black focus:outline-none focus:ring-1 focus:ring-black"
                            placeholder="Input pre-UAS" />
                        @error('pre_uas')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kuis_2" class="block text-sm font-semibold mb-1">Quiz-2</label>
                        <input type="number" name="kuis_2" id="kuis_2"
                            value="{{ old('kuis_2', $penilaian->kuis_2) !== null ? old('kuis_2', $penilaian->kuis_2) : '' }}"
                            min="0" max="100" required
                            class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm placeholder-gray-400 text-gray-400 focus:text-black focus:outline-none focus:ring-1 focus:ring-black"
                            placeholder="Input quiz-2" />
                        @error('kuis_2')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="uas" class="block text-sm font-semibold mb-1">UAS</label>
                        <input type="number" name="uas" id="uas"
                            value="{{ old('uas', $penilaian->uas) !== null ? old('uas', $penilaian->uas) : '' }}"
                            min="0" max="100" required
                            class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm placeholder-gray-400 text-gray-400 focus:text-black focus:outline-none focus:ring-1 focus:ring-black"
                            placeholder="Input UAS" />
                        @error('uas')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="preview" class="block text-sm font-semibold mb-1">Average Value</label>
                        <input type="number" id="preview" readonly
                            class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm bg-gray-100 placeholder-gray-400 focus:outline-none" />
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class="w-full bg-black text-white rounded-md py-3 font-medium text-sm">Apply</button>
                    </div>
                </form>
                <script>
                    // Change input text color to black on input, gray if empty
                    document.addEventListener('DOMContentLoaded', function() {
                        let fields = ['point', 'tugas', 'pre_uts', 'kuis_1', 'uts', 'pre_uas', 'kuis_2', 'uas'];
                        fields.forEach(function(id) {
                            let el = document.getElementById(id);

                            function updateColor() {
                                if (el.value === '') {
                                    el.classList.remove('text-black');
                                    el.classList.add('text-gray-400');
                                } else {
                                    el.classList.remove('text-gray-400');
                                    el.classList.add('text-black');
                                }
                            }
                            el.addEventListener('input', updateColor);
                            updateColor();
                        });
                    });

                    document.addEventListener('DOMContentLoaded', function() {
                        let fields = ['point', 'tugas', 'pre_uts', 'kuis_1', 'uts', 'pre_uas', 'kuis_2', 'uas'];
                        fields.forEach(function(id) {
                            let el = document.getElementById(id);
                            if (el.value === '0') {
                                el.value = ''; // Kosongkan jika 0
                            }
                        });
                    });
                </script>

                </form>
                <script>
                    function calcAverage() {
                        let fields = ['point', 'tugas', 'pre_uts', 'kuis_1', 'uts', 'pre_uas', 'kuis_2', 'uas'];
                        let sum = 0,
                            count = 0;
                        fields.forEach(function(id) {
                            let v = parseFloat(document.getElementById(id).value);
                            if (!isNaN(v)) {
                                sum += v;
                                count++;
                            }
                        });
                        document.getElementById('preview').value = count ? (sum / count).toFixed(2) : '';
                    }
                    document.addEventListener('DOMContentLoaded', function() {
                        let fields = ['point', 'tugas', 'pre_uts', 'kuis_1', 'uts', 'pre_uas', 'kuis_2', 'uas'];
                        fields.forEach(function(id) {
                            document.getElementById(id).addEventListener('input', calcAverage);
                        });
                        calcAverage();
                    });
                </script>
                </form>
            </section>
        </main>
    </div>
</body>

</html>
