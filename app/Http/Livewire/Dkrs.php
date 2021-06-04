<?php

namespace App\Http\Livewire;

use App\Models\Absensi;
use Livewire\Component;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Pertemuan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class Dkrs extends Component
{

    public $kelasId;
    public $mahasiswa_id;
    public $krsId;

    public function mount($krs_id){
        $this->krsId = $krs_id;
    }

    public function render()
    {
        $krs = Krs::where('krs_id',$this->krsId)->first();
        $kode_kelas = Kelas::pluck('kode_kelas','id');
        $kode_matkul = Kelas::pluck('kode_matkul','id');
        $nama_matkul = Kelas::pluck('nama_matkul','id');

        $pertemuans = Pertemuan::where('kelas_id',$krs->kelas_id)->get();
        $absensi = Absensi::where('krs_id',$this->krsId)->get();
        
        return view('livewire.krs.dkrs',[
            'pertemuans' => $pertemuans,
            'krs' => $krs,
            'absensi' => $absensi,
            'kode_matkul'=> $kode_matkul,
            'kode_kelas' => $kode_kelas,
            'nama_matkul' => $nama_matkul,

        ]);
    }
}

