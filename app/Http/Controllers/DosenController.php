<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\User;
use App\Models\Study;
use App\Models\Nilai;

class DosenController extends Controller
{
    public function index($dosen_id) {
        $dosen = Dosen::where('id', $dosen_id)->first();
        $mahasiswa_list = Study::whereHas('mataKuliah', function ($query) use ($dosen_id) {
            $query->where('dosen_id', $dosen_id);
        })
        ->with('mahasiswa')
        ->get()
        ->pluck('mahasiswa')
        ->unique('id')
        ->sortBy('nama')
        ->values()
        ->take(5);

        $studies = Study::whereHas('mataKuliah', function ($query) use ($dosen_id) {
            $query->where('dosen_id', $dosen_id);
        })
        ->with(['mataKuliah', 'mahasiswa', 'semester'])
        ->get()
        ->sortBy(function ($study) {
            return $study->mahasiswa->nama;
        })
        ->values();

        $study_id = $studies->pluck('id')->toArray();
        $penilaians = Nilai::whereIn('study_id', $study_id)
                            ->get()
                            ->sortBy(function($nilai) use ($study_id) {
                                return array_search($nilai->study_id, $study_id);
                            })
                            ->values();

        return view('dosen.dashboard', compact('dosen', 'mahasiswa_list', 'studies', 'penilaians'));
    }

    public function daftar_dosen() {
        $dosens = Dosen::all();
        return view('admin.daftar_dosen.index', compact('dosens'));
    }

    public function destroy($dosen_id) {
        $dosen = Dosen::where('id', $dosen_id)->first();
        $user_id = $dosen->user_id;
        $user = User::where('id', $user_id)->first();

        $dosen->delete();
        $user->delete();

        return redirect()->route('daftar_dosen.index')->with('success', 'Dosen berhasil dihapus');
    }
}
