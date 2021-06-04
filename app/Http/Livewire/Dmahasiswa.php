<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\Mahasiswa;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class Dmahasiswa extends Component
{
    use WithPagination;

    public $search;
    public $kelasId;
    public $mahasiswa_id;
    public $delId;
    public $isOpen = 0;
    public $isDel = 0;

    public function mount($kelas_id){
        $this->kelasId = $kelas_id;
    }

    public function render()
    {
        $dmahasiswa = DB::table('krs')
            ->select('mahasiswas.*', 'kelas.*', 'krs.*')
            ->join('kelas','krs.kelas_id','=','kelas.id')
            ->join('mahasiswas','krs.mahasiswa_id','=','mahasiswas.id')
            ->where('krs.kelas_id', '=', $this->kelasId)
            ->paginate(10);

        $dkelas = Kelas::find($this->kelasId);

        $dafmahasiswa = DB::table('mahasiswas')
            ->whereNotIn('mahasiswas.id', function ($query) {
                    $query->select('krs.mahasiswa_id')
                            ->from('krs')
                            ->where('krs.kelas_id', '=', $this->kelasId);
                })
            ->select('id', 'nama')
            ->get();

        return view('livewire.peserta_kelas.dmahasiswa',[
            'dkelas' => $dkelas,
            'mahasiswas' => $dmahasiswa,
            'dafmahasiswa' =>$dafmahasiswa,
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function showDel($id) {
        $this->delId = $id;
        $this->isDel = true;
    }

    public function hideDel() {
        $this->isDel = false;
    }

    public function store(){
        $this->validate(
            [
                'kelasId' => 'required',
                'mahasiswa_id' => 'required',
            ]
        );
        try {
            Krs::updateOrCreate( [
                'kelas_id' => $this->kelasId,
                'mahasiswa_id' => $this->mahasiswa_id,
            ]);
            session()->flash('info', $this->mahasiswa_id ? 'Data Peserta Kelas Berhasil Ditambahkan' : 'Data Peserta Kelas Berhasil Ditambahkan' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplcate Entry');
            }
        }

        $this->hideModal();

        $this->mahasiswa_id = '';

    }

    public function delete($id){
        try {
            $krs = Krs::where('krs_id',$id)->delete();
            $this->hideDel();
            session()->flash('delete','Peserta Kelas Berhasil Dihapus');
        }
        catch(QueryException $e) {
            $this->hideDel();
            session()->flash('delete','Tidak bisa dihapus');
        }
    }
}
