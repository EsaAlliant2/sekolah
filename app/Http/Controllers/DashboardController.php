<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        $mapel = Mapel::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();

        $id_siswa = auth()->user()->id;

        $find_siswa = Siswa::where('user_id', $id_siswa)->get();
        return view('dashboard.index', compact('guru', 'mapel', 'kelas', 'siswa','find_siswa'));

    }
}
