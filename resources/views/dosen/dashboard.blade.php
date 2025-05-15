<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fake Spot</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Orbitron:wght@700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/icon/upi.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #ffffff;
            margin: 0;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 75px;
        }

        .navbar-custom {
            background-color: #000000;
            padding: 15px 20px;
        }

        .navbar-brand {
            font-weight: bold;
            padding: 0;
        }

        .logo-fakespot {
            height: 40px;
            max-width: 100%;
        }

        .navbar-nav .nav-link {
            color: #9e9e9e;
            margin-left: 15px;
            font-size: 14px;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #ffffff;
        }

        .btn-logout {
            background-color: #800000;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            height: 40px;
        }

        .btn-logout:hover {
            background-color: #a00000;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            text-align: center;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .login-box h1 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .brand {
            font-weight: bold;
            font-style: italic;
        }

        .login-btn {
            background-color: #800000;
            color: white;
            border: none;
            padding: 12px 24px;
            width: 100%;
            margin-top: 20px;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .login-btn:hover {
            background-color: #333;
        }

        .welcome-banner {
            margin-top: 20px;
            position: relative;
            background-color: #000;
            height: 150px;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 30px;
            color: white;
        }

        .welcome-background {
            position: absolute;
            z-index: 0;
            opacity: 0.20;
        }

        .welcome-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .welcome-text {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-title {
            font-size: 40px;
            font-weight: 800;
            font-style: italic;
        }

        .welcome-subtitle {
            font-size: 14px;
            margin-top: 5px;
        }

        .welcome-character {
            position: relative;
            z-index: 1;
        }

        .welcome-character img {
            max-height: 150px;
            width: auto;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin: 25px 0 15px 0;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-see-all {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 3px 10px;
            font-size: 12px;
        }

        .custom-table {
            margin-top: 10px;
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

        .footer {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/Logo_FS.png') }}" alt="FAKESPOT" class="logo-fakespot">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}">Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('penilaian.index', ['dosen_id' => $dosen->id]) }}">Evaluation</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="btn btn-logout" href="{{ route('auth.logout') }}">
                                <i class="fas fa-power-off me-1"></i><span>Logout</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if (Auth::check())
        <div class="container">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="welcome-background">
                    <img src="{{ asset('assets/img/Logo_FS.png') }}" alt="Logo Background">
                </div>

                <div class="welcome-text">
                    <div class="welcome-title">WELCOME {{ Auth::user()->username }}!</div>
                    <div class="welcome-subtitle">Have a nice day!</div>
                </div>

                <div class="welcome-character">
                    <img src="{{ asset('assets/img/partrick_kepotong.svg') }}" alt="Patrick UPI">
                </div>
            </div>

            <!-- Student Section -->
            <div class="section-header">
                <div class="section-title">Student</div>
                <a href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}" class="btn btn-see-all">
                    See all <i class="fas fa-angle-right"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered custom-table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">NIM</th>
                            <th width="40%">Student Name</th>
                            <th width="10%">Semester</th>
                            <th width="20%">Academic Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studies as $study)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $study->mahasiswa->nim }}</td>
                                <td>{{ $study->mahasiswa->nama }}</td>
                                <td>{{ $study->semester->semester }}</td>
                                <td>{{ $study->semester->tahun_ajaran }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Evaluation Section -->
            <div class="section-header">
                <div class="section-title">Evaluation</div>
                <a href="{{ route('penilaian.index', ['dosen_id' => $dosen->id]) }}" class="btn btn-see-all">
                    See all <i class="fas fa-angle-right"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered custom-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Student Name</th>
                            <th>Point</th>
                            <th>Tugas</th>
                            <th>Pre UTS</th>
                            <th>Kuis 1</th>
                            <th>UTS</th>
                            <th>Pre UAS</th>
                            <th>Kuis 2</th>
                            <th>UAS</th>
                            <th>Average</th>
                            <th>IPK</th>
                            <th>Grade</th>
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
                            </tr>
                        @endforeach
                        @empty('penilaian')
                            <tr>
                                <td colspan="100%" class="text-center">No data grade available</td>
                            </tr>
                        @endempty
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="footer">
                © Group 8 Metro
            </div>
        </div>
    @else
        <div class="container text-center mt-5">
            <p>Please login first</p>
            <a href="{{ route('auth.login') }}">Login</a>
        </div>
    @endif

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
