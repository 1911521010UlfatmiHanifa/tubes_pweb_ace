<?php

namespace App\Http\Livewire;

use App\Models\Krs as ModelsKrs;
use App\Models\Kelas;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class Krs extends Component
 {
    use WithPagination;


    public $isOpen = 0;


    public function render()
    {
        abort_if(Gate::denies('krs_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = Auth::user();
        $krses = ModelsKrs::where('mahasiswa_id',$user->id)->paginate(10);
        $kode_kelas = Kelas::pluck('kode_kelas','id');
        $kode_matkul = Kelas::pluck('kode_matkul','id');
        $nama_matkul = Kelas::pluck('nama_matkul','id');

        return view('livewire.krs.index', [
            'krses' => $krses ,
            'kode_kelas' => $kode_kelas ,
            'kode_matkul' => $kode_matkul ,
            'nama_matkul' => $nama_matkul

        ]);
    }
}
