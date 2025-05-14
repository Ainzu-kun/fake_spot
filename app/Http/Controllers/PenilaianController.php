<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

use App\Models\Study;
use App\Models\Nilai;

class PenilaianController extends Controller
{
    public function index($dosen_id) {
        $dosen_id = Dosen::where('id', $dosen_id)->first()->id;
        $studies = Study::whereHas('mataKuliah', function ($query) use ($dosen_id) {
            $query->where('dosen_id', $dosen_id);
        })->with(['mataKuliah', 'mahasiswa', 'semester'])->get();

        $study_id = $studies->pluck('id');

        $penilaians = Nilai::whereIn('study_id', $study_id)->get();

        return view('dosen.penilaian.index', compact('penilaians', 'dosen_id'));
    }

    public function edit($dosen_id, $penilaian_id) {

        $dosen_id = Dosen::where('id', $dosen_id)->first()->id;
        $penilaian = Nilai::findOrFail($penilaian_id);

        return view('dosen.penilaian.edit', compact('penilaian', 'dosen_id'));
    }

    public function update(Request $request, $dosen_id, $penilaian_id) {
        $request->validate([
            'point' => 'required|numeric|min:0|max:100',
            'tugas' => 'required|numeric|min:0|max:100',
            'pre_uts' => 'required|numeric|min:0|max:100',
            'kuis_1' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'pre_uas' => 'required|numeric|min:0|max:100',
            'kuis_2' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ], [
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute must be a number.',
            'min' => 'The :attribute must be at least :min.',
            'max' => 'The :attribute may not be greater than :max.',
        ], [
            'point' => 'Point',
            'tugas' => 'Assignment',
            'pre_uts' => 'Pre-Midterm',
            'kuis_1' => 'Quiz 1',
            'uts' => 'Midterm Exam',
            'pre_uas' => 'Pre-Final',
            'kuis_2' => 'Quiz 2',
            'uas' => 'Final Exam',
        ]);

         $nilaiArray = [
            $request->point,
            $request->tugas,
            $request->pre_uts,
            $request->kuis_1,
            $request->uts,
            $request->pre_uas,
            $request->kuis_2,
            $request->uas
        ];

        $rataRata = array_sum($nilaiArray) / count($nilaiArray);

        if ($rataRata >= 92) {
            $grade = 'A';
            $ipk = 4.0;
        } elseif ($rataRata >= 86) {
            $grade = 'A-';
            $ipk = 3.7;
        } elseif ($rataRata >= 81) {
            $grade = 'B+';
            $ipk = 3.4;
        } elseif ($rataRata >= 76) {
            $grade = 'B';
            $ipk = 3.0;
        } elseif ($rataRata >= 71) {
            $grade = 'B-';
            $ipk = 2.7;
        } elseif ($rataRata >= 66) {
            $grade = 'C+';
            $ipk = 2.4;
        } elseif ($rataRata >= 60) {
            $grade = 'C';
            $ipk = 2.0;
        } elseif ($rataRata >= 55) {
            $grade = 'D';
            $ipk = 1.0;
        } else {
            $grade = 'E';
            $ipk = 0.0;
        }

        $penilaian = Nilai::findOrFail($penilaian_id);
        $penilaian->update([
            'point' => $request->point,
            'tugas' => $request->tugas,
            'pre_uts' => $request->pre_uts,
            'kuis_1' => $request->kuis_1,
            'uts' => $request->uts,
            'pre_uas' => $request->pre_uas,
            'kuis_2' => $request->kuis_2,
            'uas' => $request->uas,
            'IPK' => $ipk,
            'grade' => $grade,
        ]);

        return redirect()->route('penilaian.index', ['dosen_id' => $dosen_id])->with('success', 'Penilaian updated successfully.');
    }
}
