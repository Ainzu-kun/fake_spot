<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fake Spot</title>

    <link rel="shortcut icon" href="{{ asset('assets/icon/upi.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #ffffff;
            margin: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 75px;
        }

        /* Custom styles untuk navbar */
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
            line-height: 1;
            height: 40px;
        }

        .btn-logout:hover {
            background-color: #a00000;
            color: white;
        }

        /* Login container */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Card box */
        .login-box {
            text-align: center;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        /* Title style */
        .login-box h1 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        /* Brand logo part bold italic */
        .brand {
            font-weight: bold;
            font-style: italic;
        }

        /* Button */
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
            margin-top: 40px;
        }


        .welcome-background {
            position: absolute;
            inset: 0;
            z-index: 0;
            opacity: 0.15;
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
            font-family: sans-serif;
        }

        .welcome-title {
            font-size: 20px;
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
            max-height: 110px;
            width: auto;
        }

        /* Section styles */
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

        /* Table styles */
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

        /* Footer styles */
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
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/Logo FS.png') }}" alt="FAKESPOT" class="logo-fakespot">
            </a>

            <!-- Toggler untuk tampilan mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu navigasi -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}"
                                class="btn btn-see-all">Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('daftar_dosen.index') }}">Evaluation
                        </li>
                        <li class="nav-item ms-3">
                            <a class="btn btn-logout" href="{{ route('auth.logout') }}">
                                <i class="fas fa-power-off me-0"></i> Logout
                            </a>
                        </li>
                    @else
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if (Auth::check())
        <!-- Main Content -->
        <div class="container">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="welcome-background">
                    <img src="{{ asset('assets/img/Logo FS.png') }}" alt="Logo Background">
                </div>

                <div class="welcome-text">
                    <div class="welcome-title">WELCOME {{ Auth::user()->username }} Harusnya Nama</div>
                    <div class="welcome-subtitle">You teach the subject of perwibuan</div>
                </div>

                <div class="welcome-character">
                    <img src="{{ asset('assets/img/Patrik.png') }}" alt="Patrick UPI">
                </div>
            </div>
            <!-- Student Section -->
            <div class="section-header">
                <div class="section-title">Student</div>
                <a href="{{ route('mahasiswa.index', ['dosen_id' => $dosen->id]) }}" class="btn btn-see-all">See all<i
                        class="fas fa-angle-right"></i></a>
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
                        <tr>
                            <td>1</td>
                            <td>2403342</td>
                            <td>Zaky Rizzan Zain</td>
                            <td>2</td>
                            <td>2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Evaluation Section -->
            <div class="section-header">
                <div class="section-title">Evaluation</div>
                <a href="{{ route('penilaian.index', ["dosen_id" => $dosen->id]) }}" class="btn btn-see-all">See all <i
                        class="fas fa-angle-right"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered custom-table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">NIM</th>
                            <th width="20%%">Student Name</th>
                            <th width="5%">Point</th>
                            <th width="5%">Tugas</th>
                            <th width="5%">Pre UTS</th>
                            <th width="5%">Kuis 1</th>
                            <th width="5%">UTS</th>
                            <th width="5%">Pre UAS</th>
                            <th width="5%">Kuis 2</th>
                            <th width="5%">UAS</th>
                            <th width="5%">Total</th>
                            <th width="5%">Average</th>
                            <th width="5%">IPK</th>
                            <th width="5%">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2403342</td>
                            <td>Zaky Rizzan Zain</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>4.00</td>
                            <td>A</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="footer">
                © Group 8 Metro
            </div>
        </div>
    @else
        Please login first
        <br>
        <a href="{{ route('auth.login') }}">Login</a>
    @endif
</body>

</html>
