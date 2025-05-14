<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Semester;

class AdminController extends Controller
{
    public function welcome() {
        $dosens = Dosen::limit(5)->get() ?? collect();
        $matkuls = Matakuliah::orderBy('nama_mk')->limit(5)->get() ?? collect();
        $semesters = Semester::orderBy('tahun_ajaran', 'desc')
                            ->orderBy('semester')
                            ->limit(5)
                            ->get() ?? collect();

        return view('welcome', compact('dosens', 'matkuls', 'semesters'));
    }
}
