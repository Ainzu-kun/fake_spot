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
                    <a class="hover:text-white" href="#">
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
            <button
                class="flex items-center space-x-2 border border-gray-700 rounded-md px-4 py-2 text-sm text-black mb-6"
                type="button">
                <a href="{{ route('dosen.dashboard', ['dosen_id' => $dosen_id]) }}" class="flex items-center space-x-2">
                    <i class="fas fa-arrow-left">
                    </i>
                    <span>
                        Back
                    </span>
                </a>
            </button>
            <section class="mb-6">
                <div class="flex justify-between items-center bg-black rounded-xl p-6">
                    <span
                        class="font-orbitron text-white text-4xl lg:flex lg:text-8xl font-extrabold italic text-glow-red select-none"
                        style="line-height: 1">
                        EVALUATION
                    </span>
                    <div class="welcome-character">
                        <img src="{{ asset('assets/img/Patrik.png') }}" alt="Patrick UPI">
                    </div>
                </div>
            </section>
            <div class="table-responsive">
                <table class="table table-bordered custom-table">

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
                                <a href="{{ route('penilaian.edit', ['dosen_id' => $dosen_id, 'penilaian_id' => $penilaian->id]) }}"
                                    class="text-black hover:text-gray-700">
                                    <i class="fas fa-edit">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @empty($penilaian)
                        <tr>
                            <td colspan="100%" style="text-align: center;">Tidak ada data</td>
                        </tr>
                    @endempty

                </table>
            </div>
        </main>
    </div>

</body>

</html>
