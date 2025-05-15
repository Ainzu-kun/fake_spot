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
        .font-orbitron {
            font-family: 'Orbitron', sans-serif;
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

        /* Table styles */
        .custom-table {
            margin-top: 10px;
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000000;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-table th {
            background-color: #000000;
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
                    <a class="hover:text-white" href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}">
                        Dashboard
                    </a>
                    <a class="font-semibold text-white" href="#">
                        Students
                    </a>
                    <a class="hover:text-white" href="{{ route('penilaian.index', ['dosen_id' => $dosen->id]) }}">
                        Evaluation
                    </a>
                </nav>
                <a href="{{ route('auth.logout') }}">
                    <button class="bg-red-900 hover:bg-red-800 text-white text-sm font-semibold rounded-md px-4 py-2"
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
            <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen->id]) }}" class="flex items-center space-x-2">
                <button class="flex items-center space-x-2 border border-gray-700 rounded-md px-4 py-2 text-sm text-black mb-6" type="button">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back</span>
                </button>
            </a>
            <section class="mb-6">
                <div class="flex justify-between items-center bg-black rounded-xl p-6">
                    <span
                        class="font-orbitron text-white text-4xl lg:flex lg:text-8xl font-extrabold italic text-glow-red select-none"
                        style="line-height: 1">
                        STUDENT
                    </span>
                    <div class="welcome-character">
                        <img src="{{ asset('assets/img/Patrik.png') }}" alt="Patrick UPI">
                    </div>
                </div>
            </section>
            <button
                class="flex items-center space-x-2 bg-black text-white text-sm font-semibold rounded-md px-4 py-2 mb-4"
                type="button">
                <a href="{{ route('mahasiswa.create', ['dosen_id' => $dosen->id]) }}"
                    class="flex items-center space-x-2">
                    <i class="fas fa-plus">
                    </i>
                    <span>
                        Add Students
                    </span>
                </a>
            </button>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered custom-table">
                    <tr>
                        <th width="5%">No</th>
                        <th width="25%">NIM</th>
                        <th width="30%">Student Name</th>
                        <th width="10%">Semester</th>
                        <th width="10%">Academic Year</th>
                        <th width="20%">Action</th>
                    </tr>

                    @foreach ($studies as $study)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $study->mahasiswa->nim }}</td>
                            <td>{{ $study->mahasiswa->nama }}</td>
                            <td>{{ $study->semester->semester }}</td>
                            <td>{{ $study->semester->tahun_ajaran }}</td>
                            <td class=" space-x-5">
                                <a href="{{ route('mahasiswa.edit', ['study_id' => $study->id]) }}"
                                    class="text-black hover:text-gray-700" title="Edit">
                                    <i class="fas fa-edit">
                                    </i>
                                </a>
                                <a href="{{ route('penilaian.edit', ['dosen_id' => $dosen->id, 'penilaian_id' => $study->nilai->id]) }}"
                                    class="text-blue-600 hover:text-blue-700" title="View Student Value">
                                    <i class="fas fa-user"></i>
                                </a>

                                <a href="javascript:void(0);"
                                    onclick="openModal('{{ route('mahasiswa.destroy', ['study_id' => $study->id]) }}')"
                                    class="text-red-600 hover:text-red-700" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    @empty($studies)
                        <tr>
                            <td colspan="100%" style="text-align: center"> No student data available </td>
                        </tr>
                    @endempty

                </table>
            </div>
        </main>
    </div>
    <!-- Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Konfirmasi Hapus</h2>
            <p class="text-gray-600 mb-6">Apakah kamu yakin ingin menghapus data ini?</p>

            <div class="flex justify-end gap-4">
                <a id="confirmDeleteBtn"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</a>
                <button type="button" onclick="closeModal()"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        function openModal(deleteUrl) {
            const modal = document.getElementById('deleteModal');
            const confirmBtn = document.getElementById('confirmDeleteBtn');
            confirmBtn.href = deleteUrl;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</body>

</html>
