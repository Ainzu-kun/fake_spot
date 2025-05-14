<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Student Page
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&amp;display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/icon/upi.png') }}" type="image/x-icon">
    <style>
        .font-Inter {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <div>
        <form action="{{ route('mahasiswa.store', ['dosen_id' => $dosen->id]) }}" method="POST" class="w-full">
            @csrf
            <header class="bg-black flex justify-between items-center px-6 py-4 mb-6">
                <div class="flex items-center space-x-1">
                    <span class="font-orbitron text-red-600 text-xl font-extrabold italic select-none">
                        FAKE
                    </span>
                    <span
                        class="font-orbitron text-red-600 text-xl font-extrabold italic border border-red-600 rounded-md px-2 py-[2px] select-none">
                        SPOT
                    </span>
                </div>
                <div class="flex items-center space-x-8">
                    <nav class="flex items-center space-x-8 text-gray-400 text-sm font-normal">
                        <a class="hover:text-white" href="{{ route('dosen.dashboard', ['dosen_id' => $dosen->id]) }}">
                            Dashboard
                        </a>
                        <a class="font-semibold text-white" href="#">
                            Students
                        </a>
                        <a class="hover:text-white" href="#">
                            Evaluation
                        </a>
                    </nav>
                    <a href="{{ route('auth.logout') }}">
                        <button
                            class="bg-red-900 hover:bg-red-800 text-white text-sm font-semibold rounded-md px-4 py-2"
                            type="button">
                            <i class="fas fa-power-off me-0">
                            </i>
                            <span>
                                Logout
                            </span>
                        </button>
                    </a>
                </div>
            </header>
            <main class="bg-white mt-6 rounded-md p-6">
                <button
                    class="flex items-center space-x-2 border border-gray-700 rounded-md px-4 py-2 text-sm text-black mb-6"
                    type="button">
                    <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen->id]) }}"
                        class="flex items-center space-x-2">
                        <i class="fas fa-arrow-left">
                        </i>
                        <span>
                            Back
                        </span>
                    </a>
                </button>
                <section class="max-w-md mx-auto bg-white rounded-xl shadow-lg p-8"
                    style="box-shadow: 0 4px 10px rgb(0 0 0 / 0.1)">
                    <h1 class="text-center text-4xl font-inter-semibold mb-6">Create student data</h1>

                    <div class="flex space-x-4 mb-8 justify-center mt-4">
                        <button
                            class="bg-black text-white font-inter-semibold rounded-lg px-20 py-3 shadow-[0_4px_10px_rgb(0,0,0,0.15)]"
                            type="button">
                            Form
                        </button>
                        <button
                            class="bg-white text-black font-inter-semibold rounded-lg px-20 py-3 shadow-[0_4px_10px_rgb(0,0,0,0.15)]"
                            type="button">
                            CSV
                        </button>
                    </div>

                    <form class="space-y-6">
                        <div class="mb-4">
                            <label for="studentName" class="font-inter block text-sm font-bold mb-1">Student Name</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input name="nama" type="text"
                                    placeholder="Enter student name"
                                    class="font-inter-regular w-full border border-gray-300 rounded-md py-3 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-black" />
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="nim" class="font-inter block text-sm font-bold mb-1">NIM</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                    <i class="fas fa-hashtag"></i>
                                </span>
                                <input  name="nim" type="text" placeholder="Enter NIM"
                                    class="font-inter-regular w-full border border-gray-300 rounded-md py-3 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-black" />
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="sks" class="font-inter block text-sm font-bold mb-1">Semester</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                    <i class="far fa-clock"></i>
                                </span>
                                <select name="semester_id"
                                    class="font-inter-regular w-full border border-gray-300 rounded-md py-3 pl-10 pr-8 text-sm text-gray-400 appearance-none focus:outline-none focus:ring-1 focus:ring-black" required>
                                    <option disabled selected>Choose semester credit unit</option>
                                    @foreach ($semesters as $semester)
                                        <option value="{{ $semester->id }}">{{ $semester->semester }} ({{ $semester->tahun_ajaran }})</option>
                                    @endforeach
                                </select>
                                @error('semester_id')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>

                                @enderror
                                </select>
                                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-8">
                            <button type="submit"
                                class="font-inter w-full bg-black text-white rounded-md py-3 font-medium text-sm">
                                Add
                            </button>
                        </div>

                    </form>
                </section>

            </main>

    </div>
</body>
