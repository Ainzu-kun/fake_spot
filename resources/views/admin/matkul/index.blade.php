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

        .welcome-character2 {
            position: relative;
            z-index: 0;
        }

        .welcome-character img {
            max-height: 110px;
            width: auto;
        }

        .welcome-character2 img {
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

        .btn-back {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 7px 15px;
            font-size: 12px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .btn-add-subject {
            background-color: #000000;
            border: 1px solid #000000;
            border-radius: 5px;
            padding: 7px 15px;
            font-size: 12px;
            margin-top: 15px;
            margin-bottom: 15px;
            color: #ced4da;
        }
        /* Table styles */
        .custom-table {
            margin-top: 1px;
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
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" >
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/Logo FS.png') }}" alt="FAKESPOT" class="logo-fakespot">
            </a>
            
            <!-- Toggler untuk tampilan mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Menu navigasi -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('matkul.index') }}">Subjetcs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('daftar_dosen.index') }}">Lecturers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('semester.index') }}">Semester</a>
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

    <!-- Main Content -->
    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-back">Back<i class="fas fa-angle-right"></i></a>

        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <div class="welcome-background">
                <img src="{{ asset('assets/img/Logo FS.png') }}" alt="Logo Background">
            </div>
            <div class="welcome-character">
                <img src="{{ asset('assets/img/subjects.png') }}" alt="Patrick UPI">
            </div>
            <div class="welcome-character2">
                <img src="{{ asset('assets/img/Patrik.png') }}" alt="Patrick UPI">
            </div>
        </div>

        <a href="{{ route('matkul.create') }}" class="btn btn-add-subject">+ Add Subject<i class="fas fa-angle-right"></i></a>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
    <table>
        <!-- List of Lecturers Section -->
        <div class="table-responsive">
            <table class="table table-bordered custom-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Subject Code</th>
                        <th width="35%">Subject Name</th>
                        <th width="20%">Semester Credit Units (SKS)</th>
                        <th width="20%">Lecturer</th>
                        <th width="10%">Action</th>
                    </tr>
                @foreach ($matkuls as $matkul)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $matkul->kode_mk }}</td>
                        <td>{{ $matkul->nama_mk }}</td>
                        <td>{{ $matkul->sks }}</td>
                        <td>{{ $matkul->dosen->nama }}</td>
                        <td>
                            <a href="{{ route('matkul.edit', ['matkul_id' => $matkul->id]) }}">
                            <img src="{{ asset('assets/icon/logo edit.png') }}" alt="Tombol Edit" class= "action-icon">
                            </a>
                            <a href="{{ route('matkul.destroy', ['matkul_id' => $matkul->id]) }}">
                            <img src="{{ asset('assets/icon/logo hapus.png') }}" alt="Tombol Hapus" class= "action-icon">
                            </a>
                        </td>
                    </tr>
                @endforeach
    </table>
</body>
</html>
