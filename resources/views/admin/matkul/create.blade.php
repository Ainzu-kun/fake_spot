<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fake Spot</title>

    <link rel="shortcut icon" href="{{ asset('assets/icon/upi.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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

        .btn-back {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 7px 15px;
            font-size: 12px;
            margin-top: 15px;
            margin-bottom: 15px;
            margin-left: 58px;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-top:-60px;
        }

        .form-control::placeholder {
            color: #999;
        }

        .form-control-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control {
            padding-left: 40px;
        }

        .btn-black {
            background-color: black;
            color: white;
        }

        .btn-black:hover {
            background-color: #333;
        }

        .input-group-text{
            padding: 0.375rem 0.5rem;
        }
        .form-control, .form-select {
            padding-left: 0.5rem;
        }
        </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" >
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/Logo_FS.png') }}" alt="FAKESPOT" class="logo-fakespot">
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

    <div class="mb-3">
        <a href="{{ route('matkul.index') }}" class="btn btn-back">Back<i class="fas fa-angle-right"></i></a>
    </div>
    <div class="form-container">
        <h2 class="text-center mb-4">Create Subject Data</h2>
        
        <form action="{{ route('matkul.store') }}" method="POST">
            @csrf

            <!-- Kode Mata Kuliah -->
            <div class="form-group mb-3">
                <label class="form-label">Subject Code</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-hash"></i>
                    </span>
                    <input type="text" name="kode_mk" class="form-control" placeholder="Contoh: IF123" required>
                </div>
            </div>

            <!-- Nama Mata Kuliah -->
            <div class="form-group mb-3">
                <label class="form-label">Subject Name</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-file-text"></i>
                    </span>
                    <input type="text" name="nama_mk" class="form-control" placeholder="Contoh: Pemrograman Web" required>
                </div>
            </div>

            <!-- SKS -->
            <div class="form-group mb-3">
                <label class="form-label">SKS</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-clock"></i>
                    </span>
                    <input type="number" name="sks" class="form-control" placeholder="Contoh: 3" required>
                </div>
            </div>

            <!-- Dosen Pengampu -->
            <div class="form-group mb-4">
                <label class="form-label">Lecturer</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <select name="dosen_id" id="dosen_id" class="form-select" required>
                        <option disabled selected>Choose Lecturer</option>
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Tombol -->
            <button type="submit" class="btn btn-dark w-100">Add</button>
        </form>
    </div>
</body>
</html>
