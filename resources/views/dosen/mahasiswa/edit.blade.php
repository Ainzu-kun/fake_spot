<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student Page | Fake Spot</title>

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
                        <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen->id]) }}" class="hover:text-white">Dashboard</a>
                        <a href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}" class="font-semibold text-white">Students</a>
                        <a href="{{ route('penilaian.index', ['dosen_id' => $dosen->id]) }}" class="hover:text-white">Evaluation</a>
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
                    <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen->id]) }}" class="hover:text-white">Dashboard</a>
                    <a href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}" class="font-semibold text-white">Students</a>
                    <a href="{{ route('penilaian.index', ['dosen_id' => $dosen->id]) }}" class="hover:text-white">Evaluation</a>
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
            <button type="button" class="flex items-center space-x-2 border border-gray-700 rounded-md px-4 py-2 text-sm text-black mb-6">
                <a href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}" class="flex items-center space-x-2">
                    <i class="fas fa-arrow-left"></i> <span>Back</span>
                </a>
            </button>

            <section class="max-w-md mx-auto bg-white rounded-xl shadow-lg p-8" style="box-shadow: 0 4px 10px rgb(0 0 0 / 0.3)">
                <h1 class="text-center text-4xl font-semibold mb-6">Edit student data</h1>

                <form action="{{ route('mahasiswa.update', ['study_id' => $study->id]) }}" method="post" class="space-y-6">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-semibold mb-1">Student Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" name="nama" value="{{ $study->mahasiswa->nama }}" class="w-full border border-gray-300 rounded-md py-3 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-black" required >
                        </div>
                        @error('nama')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nim" class="block text-sm font-semibold mb-1">NIM</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <i class="fas fa-hashtag"></i>
                            </span>
                            <input type="number" name="nim" value="{{ $study->mahasiswa->nim }}" class="w-full border border-gray-300 rounded-md py-3 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-black" required >
                        </div>
                        @error('nim')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="semester_id" class="block text-sm font-semibold mb-1">Semester</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <i class="far fa-clock"></i>
                            </span>
                            <select name="semester_id" class="w-full border border-gray-300 rounded-md py-3 pl-10 pr-8 text-sm text-[#010101] appearance-none focus:outline-none focus:ring-1 focus:ring-black" required >
                                <option disabled>Choose semester credit unit</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}" {{ $study->semester_id == $semester->id ? 'selected' : '' }}>
                                        Semester {{ $semester->semester }} ({{ $semester->tahun_ajaran }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('semester_id')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-8">
                        <button type="submit" class="w-full bg-black text-white rounded-md py-3 font-medium text-sm">Apply</button>
                    </div>
                </form>
            </section>
        </main>
        {{-- Content end --}}
    </div>

    <script>
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
