<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Semester;

class AdminController extends Controller
{
    public function welcome() {
        $dosens = Dosen::limit(5)->get();

        $matkuls = MataKuliah::orderBy('nama_mk', 'asc')->limit(5)->get();
        $semesters = Semester::orderBy('tahun_ajaran', 'desc')
                            ->orderBy('semester', 'asc')
                            ->limit(5)
                            ->get();

        return view('welcome', compact('dosens', 'matkuls', 'semesters'));
    }
}
