<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fake Spot</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Orbitron:wght@700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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
            margin: 20px auto 40px;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            background-color: #fff;
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
    <nav class="navbar navbar-expand-lg navbar-custom navbar-dark fixed-top" >
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets/img/Logo_FS.png') }}" alt="FAKESPOT" class="logo-fakespot">
            </a>

            <!-- Toggler untuk tampilan mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu navigasi -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('matkul.index') }}">Subjetcs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daftar_dosen.index') }}">Lecturers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('semester.index') }}">Semester</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="btn btn-logout" href="{{ route('auth.logout') }}">
                            <i class="fas fa-power-off me-1"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mb-3">
        <a href="{{ route('semester.index') }}" class="btn btn-back"><i class="fas fa-arrow-left me-1"></i>Back</a>
    </div>

    <div class="form-container">
        <h2 class="text-center mb-4">Edit Semester Data</h2>

        <form action="{{ route('semester.update', ['semester_id' => $semester->id]) }}" method="POST">
            @csrf
            <!-- Input Semester -->
            <div class="form-group mb-3">
                <label class="form-label" for="semester">Semester</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                    <input type="number" name="semester" id="semester" value="{{ $semester->semester }}" class="form-control" min="1" max="4" required />
                </div>
            </div>

            <!-- Input Tahun Ajaran -->
            <div class="form-group mb-4">
                <label class="form-label" for="tahun_ajaran">Academic Year</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <select name="tahun_ajaran" id="tahun_ajaran" class="form-select" required >
                        <option disabled selected>Choose Academic Year</option>
                        @for ($year = 2017; $year <= 2026; $year++)
                            <option value="{{ $year }}" {{ $semester->tahun_ajaran == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-dark w-100">Update Semester Data</button>
        </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>
