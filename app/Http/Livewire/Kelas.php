<?php

namespace App\Http\Livewire;

use App\Models\Kelas as ModelsKelas;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class Kelas extends Component
{
    use WithPagination;

    public $search;
    public $kelasId,$kode_kelas,$nama_matkul,$kode_matkul,$tahun,$semester,$sks;
    public $delId;
    public $isOpen = 0;
    public $isDel = 0;

    public function render()
    {
        abort_if(Gate::denies('kelas_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $searchParams = '%'.$this->search.'%';
        $kelases = ModelsKelas::where('nama_matkul','like', $searchParams)->orderBy('tahun', 'desc')
                                ->orderBy('semester', 'desc')
                                ->paginate(10);

        return view('livewire.kelas.index', [
            'kelases' => $kelases
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
                'kode_kelas' => 'required',
                'kode_matkul' => 'required',
                'nama_matkul' => 'required',
                'tahun' => 'required|numeric|min:2021',
                'semester' => 'required',
                'sks' => 'required|numeric|min:1',
            ]
        );
        try {
            ModelsKelas::updateOrCreate(['id' => $this->kelasId], [
                'kode_kelas' => $this->kode_kelas,
                'kode_matkul' => $this->kode_matkul,
                'nama_matkul' => $this->nama_matkul,
                'tahun' => $this->tahun,
                'semester' => $this->semester,
                'sks' => $this->sks,
            ]);
            session()->flash('info', $this->kelasId ? 'Kelas Update Successfully' : 'Kelas Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        $this->hideModal();

        $this->kelasId = '';
        $this->kode_kelas = '';
        $this->kode_matkul= '';
        $this->nama_matkul= '';
        $this->tahun= '';
        $this->semester= '';
        $this->sks= '';

    }

    public function edit($id){
        $kelas = ModelsKelas::findOrFail($id);
        $this->kelasId = $id;
        $this->kode_kelas = $kelas->kode_kelas;
        $this->kode_matkul= $kelas->kode_matkul;
        $this->nama_matkul= $kelas->nama_matkul;
        $this->tahun= $kelas->tahun;
        $this->semester= $kelas->semester;
        $this->sks= $kelas->sks;
        $this->showModal();
    }

    public function delete($id){
        try{
        ModelsKelas::find($id)->delete();
        User::find($id)->delete();

        $this->hideDel();
        
        session()->flash('delete','Kelas Successfully Deleted');
        }
        catch(QueryException $e) {
            $this->hideDel();
            session()->flash('delete','Tidak bisa dihapus');
        }
    }
}
