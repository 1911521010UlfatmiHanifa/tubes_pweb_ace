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

    public function upcsv(){
        
        $fileName = $_FILES["file"]["tmp_name"];
        $namaFile = $_FILES["file"]["name"];
        $ekstensiValid = 'csv';
        $ekstensiFile = explode('.', $namaFile);
        $ekstensiFile = strtolower(end($ekstensiFile));
        
        if ($ekstensiFile != $ekstensiValid) {
            print("Pilih Ekstensi File Yang Sesuai");
        } 
        else {
            $file = fopen($fileName, "r");
            $skipLines = 7;
            $lineNum = 1;
            while (fgetcsv($file)) {
                if ($lineNum > $skipLines) {
                    break;
                }
                $lineNum++;
            }
            $data = array();

            $i=0;
            while (($column = fgetcsv($file, 1000, ";")) !== FALSE) {
                $num = count($column);
                $num--;
                for ($c = 0 ; $c < $num ; $c++){
                    if ($c == 0) {
                        $data[$i][$c] = substr($column[$c], -10);
                    }
                    if ($c == 1) {
                        $data[$i][$c] = explode(",", $column[$c]);
                        if ($c == 1) {
                            $data[$i][$c] = explode(" ", $column[$c]);
                        }
                    }
                    if ($c == 2) {
                        $data[$i][$c] = explode(",",$column[$c]);
                        if ($c == 2) {
                            $data[$i][$c] = explode(" ", $column[$c]);
                        }
                    }

                    $data[$i][] = $column[$c];
                }
                $i++;
            }
            $check = count ($data);
        }

    }

}