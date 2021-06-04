<?php

namespace App\Http\Livewire;

use App\Models\Pertemuan as ModelsPertemuan;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Livewire\WithPagination;

class Pertemuan extends Component
{
    public $kelasId;
    public $pertemuanId,$pertemuan_ke,$tanggal,$materi;
    public $isOpen = 0;

    public function mount($kelas_id){
        $this->kelasId = $kelas_id;
    }

    public function render()
    {
        $pertemuans=ModelsPertemuan::where('kelas_id',$this->kelasId)->paginate(10);
        return view('livewire.pertemuan.index',[
            'pertemuans' => $pertemuans
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function store(){
        $this->validate(
            [
                'pertemuan_ke' => 'required|numeric|min:1',
                'tanggal' => 'required',
                'materi' => 'required',
            ]
        );
        try {
            ModelsPertemuan::updateOrCreate(['pertemuan_id' => $this->pertemuanId], [
                'kelas_id' => $this->kelasId,
                'pertemuan_ke' => $this->pertemuan_ke,
                'tanggal' => $this->tanggal,
                'materi' => $this->materi,
            ]);
            session()->flash('info', $this->pertemuanId ? 'Pertemuan Update Successfully' : 'Pertemuan Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplcate Entry');
            }
        }

        $this->hideModal();

        // session()->flash('info', $this->pertemuanId ? 'Pertemuan Update Successfully' : 'Pertemuan Created Successfully' );

        $this->pertemuanId = '';
        $this->pertemuan_ke = '';
        $this->tanggal= '';
        $this->materi= '';

    }

}
