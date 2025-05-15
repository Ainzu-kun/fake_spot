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
                    <a class="hover:text-white"
                        href="#">Dashboard</a>
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
                <a href="#"
                    class="flex items-center space-x-2">
                    <i class="fas fa-arrow-left"></i> <span>Back</span>
                </a>
            </button>

            <section class="max-w-md mx-auto bg-white rounded-xl shadow-lg p-8"
                style="box-shadow: 0 4px 10px rgb(0 0 0 / 0.1)">
                <h1 class="text-center text-4xl font-semibold mb-6">Edit student data</h1>

                <form action="{{ route('mahasiswa.update', ['study_id' => $study->id]) }}" method="POST"
                    class="space-y-6">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1">Student Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <i class="fas fa-user"></i>
                            </span>
                            <input name="nama" type="text" required placeholder="Enter student name"
                                class="w-full border border-gray-300 rounded-md py-3 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-black" />
                        </div>
                        @error('nama')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1">NIM</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <i class="fas fa-hashtag"></i>
                            </span>
                            <input name="nim" type="text" required placeholder="Enter NIM"
                                class="w-full border border-gray-300 rounded-md py-3 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-black" />
                        </div>
                        @error('nim')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1">Semester</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <i class="far fa-clock"></i>
                            </span>
                            <select name="semester_id" required
                                class="w-full border border-gray-300 rounded-md py-3 pl-10 pr-8 text-sm text-[#010101] appearance-none focus:outline-none focus:ring-1 focus:ring-black">
                                <option disabled selected>Choose semester credit unit</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->semester }}
                                        ({{ $semester->tahun_ajaran }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('semester_id')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class="w-full bg-black text-white rounded-md py-3 font-medium text-sm">Add</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>

</html>
