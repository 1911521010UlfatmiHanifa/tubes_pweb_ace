<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;

class Dkelas extends Component
{
    public $kelasId;
    public function mount($kelas_id){
        $this->kelasId = $kelas_id;
    }

    public function render()
    {
        $dkelas = Kelas::find($this->kelasId);
        return view('livewire.kelas.dkelas',[
            'dkelas' => $dkelas
        ]);
    }
}
