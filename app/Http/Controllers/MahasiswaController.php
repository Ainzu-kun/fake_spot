<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Study;
use App\Models\Semester;

class MahasiswaController extends Controller
{
    public function index($dosen_id) {
        $dosen = Dosen::findOrFail($dosen_id);
        $mahasiswa_list = Study::whereHas('mataKuliah', function ($query) use ($dosen_id) {
            $query->where('dosen_id', $dosen_id);
        })
        ->with('mahasiswa') // eager load mahasiswa
        ->get()
        ->pluck('mahasiswa')
        ->unique('id');

        $studies = Study::whereHas('mataKuliah', function ($query) use ($dosen_id) {
            $query->where('dosen_id', $dosen_id);
        })->with(['mataKuliah', 'mahasiswa', 'semester'])->get();

        return view('dosen.mahasiswa.index', compact('mahasiswa_list', 'dosen', 'studies'));
    }

    public function create($dosen_id) {
        $dosen = Dosen::findOrFail($dosen_id);
        $semesters = Semester::orderBy('tahun_ajaran', 'desc')
                            ->orderBy('semester', 'asc')
                            ->get();
        return view('dosen.mahasiswa.create', compact('dosen', 'semesters'));
    }

    public function download_template() {
        $file = public_path('download/template-data-mahasiswa.csv');
        return response()->download($file);
    }

    public function import(Request $request, $dosen_id) {
        $request->validate([
            'semester_id' => 'required|exists:semesters,id',
            'file' => 'required|mimes:csc,txt|max:5120',
        ], [
            'semester_id.required' => 'Semester harus dipilih.',
            'semester_id.exists' => 'Semester tidak valid.',
            'file.required' => 'File harus diunggah.',
            'file.mimes' => 'File harus berupa CSV',
            'file.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
        ]);

        $file = $request->file('file');
        $lines = file($file->getPathname(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (!$lines || count($lines) < 2) {
            return redirect()->back()->withErrors(['file' => 'File CSV kosong atau tidak valid.']);
        }

        $mata_kuliah_id = MataKuliah::where('dosen_id', $dosen_id)->pluck('id')->first();
        if (!$mata_kuliah_id) {
            return redirect()->back()->withErrors(['error' => 'Mata kuliah tidak ditemukan untuk dosen ini.']);
        }

        // Lewati baris header
        $imported_count = 0;
        foreach (array_slice($lines, 1) as $line_num => $line) {
            $data = array_map('trim', explode(';', $line));

            if (count($data) < 2 || empty($data[0]) || empty($data[1])) {
                Log::warning("Baris $line_num diabaikan karena format tidak valid: $line");
                continue;
            }

            try {
                $mahasiswa = Mahasiswa::create([
                    'nim' => $data[0],
                    'nama' => $data[1],
                ]);

                Study::create([
                    'mahasiswa_id' => $mahasiswa->id,
                    'mata_kuliah_id' => $mata_kuliah_id,
                    'semester_id' => $request->semester_id,
                ]);

                $imported_count++;
            } catch (\Exception $e) {
                Log::error("Gagal impor baris $line_num: " . $e->getMessage());
                continue; // Lanjutkan ke baris berikutnya meski error
            }
        }

        return redirect()->route('mahasiswa.index', ['dosen_id' => $dosen_id])->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function store(Request $request, $dosen_id) {
        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim|min_digits:7|max_digits:7',
            'nama' => 'required|string|max:255',
            'semester_id' => 'required|exists:semesters,id',
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'nim.min_digits' => 'NIM harus terdiri dari 7 digit.',
            'nim.max_digits' => 'NIM harus terdiri dari 7 digit.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'semester_id.required' => 'Semester harus dipilih.',
            'semester_id.exists' => 'Semester tidak valid.',
        ]);

        $new_mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
        ]);

        $mata_kuliah_id = MataKuliah::where('dosen_id', $dosen_id)->pluck('id');

        Study::create([
            'mahasiswa_id' => $new_mahasiswa->id,
            'mata_kuliah_id' => $mata_kuliah_id[0],
            'semester_id' => $request->semester_id,
        ]);

        return redirect()->route('mahasiswa.index', ['dosen_id' => $dosen_id])->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit($study_id) {
        $study = Study::where('id', $study_id)->first();
        $semesters = Semester::orderBy('tahun_ajaran', 'desc')
                            ->orderBy('semester', 'asc')
                            ->get();

        return view('dosen.mahasiswa.edit', compact('study', 'semesters'));
    }

    public function update(Request $request, $study_id) {
        $request->validate([
            'nim' => 'required|numeric|min_digits:7|max_digits:7',
            'nama' => 'required|string|max:255',
            'semester_id' => 'required|exists:semesters,id',
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.min_digits' => 'NIM harus terdiri dari 7 digit.',
            'nim.max_digits' => 'NIM harus terdiri dari 7 digit.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'semester_id.required' => 'Semester harus dipilih.',
            'semester_id.exists' => 'Semester tidak valid.',
        ]);

        $study = Study::where('id', $study_id)->first();
        $mahasiswa = Mahasiswa::where('id', $study->mahasiswa_id)->first();

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
        ]);

        $study->update([
            'semester_id' => $request->semester_id,
        ]);

        return redirect()->route('mahasiswa.index', ['dosen_id' => $study->mataKuliah->dosen_id])->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy($study_id) {
        $study = Study::where('id', $study_id)->first();
        $mahasiswa = Mahasiswa::where('id', $study->mahasiswa_id)->first();

        $study->delete();
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index', ['dosen_id' => $study->mataKuliah->dosen_id])->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
