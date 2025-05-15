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
                        href="{{ route('dosen.dashboard', ['dosen_id' => $dosen->id]) }}">Dashboard</a>
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
                <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen->id]) }}"
                    class="flex items-center space-x-2">
                    <i class="fas fa-arrow-left"></i> <span>Back</span>
                </a>
            </button>

            <section class="max-w-md mx-auto bg-white rounded-xl shadow-lg p-8"
                style="box-shadow: 0 4px 10px rgb(0 0 0 / 0.1)">
                <h1 class="text-center text-4xl font-semibold mb-6">Create student data</h1>

                <div class="flex space-x-4 mb-8 justify-center mt-4">
                    <button id="btnForm" type="button" onclick="showForm()"
                        class="bg-white text-black font-semibold rounded-lg px-20 py-3 shadow-[0_4px_10px_rgb(0,0,0,0.15)]">Form</button>
                    <button id="btnCSV" type="button" onclick="showCSV()"
                        class="bg-black text-white font-semibold rounded-lg px-20 py-3 shadow-[0_4px_10px_rgb(0,0,0,0.15)]">CSV</button>
                </div>

                <div id="formContainer" class="space-y-6 hidden">
                    <form action="{{ route('mahasiswa.store', ['dosen_id' => $dosen->id]) }}" method="POST"
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
                    </form>
                </div>

                <form action="{{ route('mahasiswa.import', ['dosen_id' => $dosen->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="csvContainer" class="space-y-6">
                        <div class="mb-4">
                            <label class="font-inter block text-sm font-bold mb-1">Download Template</label>
                            <a href="{{ route('mahasiswa.download_template') }}"
                                class="font-inter-regular w-full inline-block bg-black text-white rounded-md py-3 px-4 text-sm font-semibold hover:bg-gray-800 transition text-center">
                                <i class="fas fa-download mr-2"></i> Download
                            </a>
                            <p class="text-gray-500 text-xs mt-2">*Make sure the data content and format match the
                                template provided.</p>
                        </div>


                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1">Semester</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                    <i class="far fa-clock"></i>
                                </span>
                                <select name="semester_id_csv" required
                                    class="w-full border border-gray-300 rounded-md py-3 pl-10 pr-8 text-sm text-[#000] appearance-none focus:outline-none focus:ring-1 focus:ring-black">
                                    <option disabled selected>Choose semester credit unit</option>
                                    @foreach ($semesters as $semester)
                                        <option value="{{ $semester->id }}">{{ $semester->semester }}
                                            ({{ $semester->tahun_ajaran }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('semester_id_csv')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1">Upload Student Data</label>
                            <label
                                class="w-full bg-black text-white rounded-md py-3 px-4 text-sm font-semibold hover:bg-gray-800 transition flex items-center cursor-pointer">
                                <span id="csvFileName" class="flex-1 text-left">Choose file</span>
                                <input name="file" type="file" accept=".csv" required class="hidden"
                                    onchange="handleFileChange(this)">
                            </label>
                            <p class="text-gray-500 text-xs mt-2">*Maximum size of upload data file (5mb)</p>
                            @error('file')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                            @if ($errors->any())
                                <div class="mt-2">
                                    @foreach ($errors->all() as $error)
                                        <span class="text-red-500 text-xs mt-1">{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class="w-full bg-black text-white rounded-md py-3 font-medium text-sm">Add</button>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <script>
        function handleFileChange(input) {
            const file = input.files[0];
            const maxSize = 5 * 1024 * 1024;
            const fileNameSpan = document.getElementById('csvFileName');

            if (file && file.size > maxSize) {
                alert("File terlalu besar, maksimal 5MB.");
                input.value = "";
                fileNameSpan.textContent = "Choose file";
            } else {
                fileNameSpan.textContent = file?.name || "Choose file";
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const btnForm = document.getElementById("btnForm");
            const btnCSV = document.getElementById("btnCSV");
            const formContainer = document.getElementById("formContainer");
            const csvContainer = document.getElementById("csvContainer");

            function setDisabledFields(container, disabled) {
                const inputs = container.querySelectorAll("input, select, textarea");
                inputs.forEach(input => {
                    input.disabled = disabled;
                });
            }

            btnForm.addEventListener("click", function() {
                formContainer.classList.remove("hidden");
                csvContainer.classList.add("hidden");

                btnForm.classList.add("bg-black", "text-white");
                btnForm.classList.remove("bg-white", "text-black");
                btnCSV.classList.remove("bg-black", "text-white");
                btnCSV.classList.add("bg-white", "text-black");

                setDisabledFields(formContainer, false);
                setDisabledFields(csvContainer, true);
            });

            btnCSV.addEventListener("click", function() {
                csvContainer.classList.remove("hidden");
                formContainer.classList.add("hidden");

                btnCSV.classList.add("bg-black", "text-white");
                btnCSV.classList.remove("bg-white", "text-black");
                btnForm.classList.remove("bg-black", "text-white");
                btnForm.classList.add("bg-white", "text-black");

                setDisabledFields(csvContainer, false);
                setDisabledFields(formContainer, true);
            });

            // Set default view to CSV
            btnForm.click();
        });
    </script>
</body>

</html>
