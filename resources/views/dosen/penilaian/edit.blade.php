<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit student data | Fake Spot</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Orbitron:wght@700&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/icon/upi.png') }}" type="image/x-icon">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body>
    <div>

        {{-- Header start --}}
        <header class="bg-black px-6 py-4 mb-6">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-1">
                    <span class="font-orbitron text-red-600 text-xl font-extrabold italic select-none">Fake</span>
                    <span class="font-orbitron text-red-600 text-xl font-extrabold italic border border-red-600 rounded-md px-2 py-[2px] select-none">SPOT</span>
                </div>

                <!-- Hamburger (muncul di < md) -->
                <button id="menuBtn" class="md:hidden text-white focus:outline-none">
                    <!-- ikon hamburger -->
                    <svg id="iconHamburger" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- ikon close (default tersembunyi) -->
                    <svg id="iconClose" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Menu desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <nav class="flex items-center space-x-8 text-gray-400 text-sm font-normal">
                        <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen_id]) }}" class="hover:text-white">Dashboard</a>
                        <a href="{{ route('mahasiswa.index', ['dosen_id' => $dosen_id]) }}" class="hover:text-white">Students</a>
                        <a href="{{ route('penilaian.index', ['dosen_id' => $dosen_id]) }}" class="font-semibold text-white">Evaluation</a>
                    </nav>
                    <a href="{{ route('auth.logout') }}">
                        <button type="button"
                            class="bg-red-900 hover:bg-red-800 text-white text-sm font-semibold rounded-md px-4 py-2">
                            <i class="fas fa-power-off"></i> <span>Logout</span>
                        </button>
                    </a>
                </div>
            </div>

            <!-- Menu mobile (default: hidden) -->
            <div id="mobileMenu" class="md:hidden max-h-0 overflow-hidden opacity-0 transition-all duration-1000 ease-in-out mt-4 flex flex-col items-center text-center gap-y-4">
                <nav class="flex flex-col text-gray-400 text-sm font-normal space-y-2">
                    <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen_id]) }}" class="hover:text-white">Dashboard</a>
                    <a href="{{ route('mahasiswa.index', ['dosen_id' => $dosen_id]) }}" class="font-semibold text-white">Students</a>
                    <a href="{{ route('penilaian.index', ['dosen_id' => $dosen_id]) }}" class="hover:text-white">Evaluation</a>
                </nav>
                <a href="{{ route('auth.logout') }}">
                    <button type="button"
                        class="bg-red-900 hover:bg-red-800 text-white text-sm font-semibold rounded-md px-4 py-2">
                        <i class="fas fa-power-off"></i> <span>Logout</span>
                    </button>
                </a>
            </div>
        </header>
        {{-- Header end --}}

        {{-- Content start --}}
        <main class="bg-white mt-6 rounded-md p-6">
            <a href="{{ url()->previous() }}" class="flex items-center space-x-2">
                <button type="button" class="flex items-center space-x-2 border border-gray-700 rounded-md px-4 py-2 text-sm text-black mb-6">
                    <i class="fas fa-arrow-left"></i> <span>Back</span>
                </button>
            </a>

            <section class="max-w-md mx-auto bg-white rounded-xl shadow-lg p-8" style="box-shadow: 0 4px 10px rgb(0 0 0 / 0.3)">
                <h1 class="text-center text-4xl font-extrabold mb-6">Edit Student Value</h1>
                <h2 class="text-center text-2xl font-semibold mb-6">{{ $penilaian->studies->mahasiswa->nama }}</h2>
                <h4 class="text-center text-sm font-semibold mb-6 text-gray-400">Fill in each value from 0 to 100!</h4>

                <form action="{{ route('penilaian.update', ['dosen_id' => $dosen_id, 'penilaian_id' => $penilaian->id]) }}" method="post" class="space-y-6">
                    @csrf

                    @php
                        $fields = [
                            'point' => 'Point',
                            'tugas' => 'Task',
                            'pre_uts' => 'Pre UTS',
                            'kuis_1' => 'Quiz-1',
                            'uts' => 'UTS',
                            'pre_uas' => 'Pre UAS',
                            'kuis_2' => 'Quiz-2',
                            'uas' => 'UAS',
                        ];
                    @endphp

                    @foreach ($fields as $key => $label)
                        <div class="mb-4">
                            <label for="{{ $key }}" class="block text-sm font-semibold mb-1">{{ $label }}</label>
                            <input type="number" name="{{ $key }}" id="{{ $key }}"
                                value="{{ old($key, $penilaian->$key) !== null ? old($key, $penilaian->$key) : '' }}"
                                min="0" max="100"
                                class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm placeholder-gray-400 text-gray-400 focus:text-black focus:outline-none focus:ring-1 focus:ring-black"
                                required />
                            @error($key)
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach
                    <div class="mb-4">
                        <label for="preview" class="block text-sm font-semibold mb-1">Average Value</label>
                        <input type="number" id="preview" class="w-full border border-gray-300 rounded-md py-3 px-3 text-sm bg-gray-100 placeholder-gray-400 focus:outline-none" readonly />
                    </div>
                    <div class="mt-8">
                        <button type="submit" class="w-full bg-black text-white rounded-md py-3 font-medium text-sm">
                            Apply
                        </button>
                    </div>
                </form>
            </section>
        </main>
        {{-- Content end --}}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fields = ['point', 'tugas', 'pre_uts', 'kuis_1', 'uts', 'pre_uas', 'kuis_2', 'uas'];

            // Update input color
            fields.forEach(id => {
                const el = document.getElementById(id);
                const updateColor = () => {
                    el.classList.toggle('text-black', el.value !== '');
                    el.classList.toggle('text-gray-400', el.value === '');
                };
                el.addEventListener('input', updateColor);
                updateColor();
            });

            // Kosongkan nilai jika 0
            fields.forEach(id => {
                const el = document.getElementById(id);
                if (el.value === '0') el.value = '';
            });

            // Kalkulasi rata-rata
            const calcAverage = () => {
                let sum = 0, count = 0;
                fields.forEach(id => {
                    const val = parseFloat(document.getElementById(id).value);
                    if (!isNaN(val)) {
                        sum += val;
                        count++;
                    }
                });
                document.getElementById('preview').value = count ? (sum / count).toFixed(2) : '';
            };

            fields.forEach(id => {
                document.getElementById(id).addEventListener('input', calcAverage);
            });

            calcAverage();
        });

        const btn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconBurger = document.getElementById('iconHamburger');
        const iconClose = document.getElementById('iconClose');

        btn.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.contains('max-h-0');

            if (isOpen) {
                mobileMenu.classList.remove('max-h-0', 'opacity-0');
                mobileMenu.classList.add('max-h-[500px]', 'opacity-100');
            } else {
                mobileMenu.classList.add('max-h-0', 'opacity-0');
                mobileMenu.classList.remove('max-h-[500px]', 'opacity-100');
            }

            iconBurger.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });
    </script>
</body>

</html>
