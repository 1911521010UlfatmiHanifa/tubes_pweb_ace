<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Krs;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Pertemuan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class Dpertemuan extends Component
{
    use WithFileUploads;
    public $pertemuanId;
    public $isOpen = 0;
    public $pertemuan_id, $mahasiswa_id,$jam_masuk, $jam_keluar, $durasi, $absensi_id;

    public function mount($pertemuan_id){
        $this->pertemuanId = $pertemuan_id;
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function render()
    {
        $dpertemuan = Pertemuan::where('pertemuan_id',$this->pertemuanId)->first();

        $kode_kelas = Kelas::pluck('kode_kelas','id');
        $kode_matkul = Kelas::pluck('kode_matkul','id');
        $nama_matkul = Kelas::pluck('nama_matkul','id');

        $absensi = Absensi::where('pertemuan_id',$this->pertemuanId)->paginate(10);
        $krs_id = Krs::pluck('mahasiswa_id','krs_id');
        $nim = Mahasiswa::pluck('nim','id');
        $nama = Mahasiswa::pluck('nama','id');

        return view('livewire.pertemuan.dpertemuan',[
            'dpertemuan' => $dpertemuan,
            'kode_matkul'=> $kode_matkul,
            'kode_kelas' => $kode_kelas,
            'nama_matkul' => $nama_matkul,
            'absensi' => $absensi,
            'krs_id' => $krs_id,
            'nim' => $nim,
            'nama' => $nama
        ]);
    }
}
