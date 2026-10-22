<?php

namespace App\Http\Controllers;

use App\Models\Dasawisma;
use App\Models\PkkKegiatan;
use App\Models\PkkPengurus;
use App\Models\PkkProfil;
use App\Models\PkkProgram;

class PkkController extends Controller
{
    public function index()
    {
        $profil = PkkProfil::first();
        $pengurus = PkkPengurus::orderBy('urutan')->orderBy('id')->get();
        $programs = PkkProgram::orderBy('urutan')->orderBy('id')->get();
        $kegiatans = PkkKegiatan::orderByDesc('tanggal_kegiatan')->orderByDesc('id')->take(6)->get();
        $totalDasawisma = Dasawisma::count();

        return view('pkk.index', compact('profil', 'pengurus', 'programs', 'kegiatans', 'totalDasawisma'));
    }
}
