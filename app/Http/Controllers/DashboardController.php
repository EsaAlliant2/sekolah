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

        return view('dashboard.index', compact('guru', 'mapel', 'kelas', 'siswa'));
    }
}
