<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Page | Fake Spot</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Orbitron:wght@700&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/icon/upi.png') }}" type="image/x-icon">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .text-glow-red {
            text-shadow:
                0 0 5px #ff0000,
                0 0 10px #ff0000,
                0 0 20px #ff0000,
                0 0 40px #ff0000;
        }

        .welcome-character {
            position: relative;
            z-index: 1;
            width: 200px;
            height: auto;
            margin-left: 20px;
        }

        .custom-table {
            margin-top: 10px;
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-table th {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 8px;
        }

        .custom-table td {
            padding: 8px;
            text-align: center;
            background-color: white;
        }

        .custom-table tr:nth-child(odd) td {
            background-color: #f2f2f2;
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
                        <i class="fas fa-power-off"></i><span>Logout</span>
                    </button>
                </a>
            </div>
        </header>
        {{-- Header end --}}

        {{-- Content start --}}
        <main class="bg-white mt-6 rounded-md p-6">
            <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen_id]) }}" class="flex items-center space-x-2">
                <button type="button" class="flex items-center space-x-2 border border-gray-700 rounded-md px-4 py-2 text-sm text-black mb-6">
                    <i class="fas fa-arrow-left"></i> <span>Back</span>
                </button>
            </a>

            <section class="mb-6">
                <div class="flex justify-between items-center bg-black rounded-xl px-6">
                    <span class="text-white text-4xl lg:text-8xl font-extrabold italic text-glow-red select-none">
                        EVALUATION
                    </span>
                    <div class="welcome-character">
                        <img src="{{ asset('assets/img/partrick_kepotong.svg') }}" alt="Patrick Masuk UPI">
                    </div>
                </div>
            </section>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="w-full overflow-x-auto rounded-md">
                <table class="table table-bordered custom-table text-sm w-full min-w-[800px]">
                    <thead>
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
                    </thead>
                    <tbody>
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
                                    <a href="{{ route('penilaian.edit', ['dosen_id' => $dosen_id, 'penilaian_id' => $penilaian->id]) }}" class="text-black hover:text-gray-700">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @empty('penilaian')
                            <tr>
                                <td colspan="100%" class="text-center">Tidak ada data</td>
                            </tr>
                        @endempty
                    </tbody>
                </table>
            </div>
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
