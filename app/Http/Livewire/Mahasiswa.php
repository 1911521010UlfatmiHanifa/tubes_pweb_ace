<?php

namespace App\Http\Livewire;

use App\Models\Mahasiswa as ModelsMahasiswa;
use App\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class Mahasiswa extends Component
{
    use WithPagination;

    public $search;
    public $mahasiswaId,$nama,$nim,$email;
    public $delId;
    public $isOpen = 0;
    public $isDel = 0;

    public function render()
    {
        abort_if(Gate::denies('mahasiswa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $searchParams = '%'.$this->search.'%';
        $mahasiswas = ModelsMahasiswa::where('nama','like', $searchParams)
        ->orderBy('id')
        ->paginate(10);

        return view('livewire.mahasiswa.index', [
            'mahasiswas' => $mahasiswas
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
                'nama' => 'required',
                'nim' => 'required|numeric|min:0',
                'email' => 'required|email',
            ]
        );
        try {
        	$user=User::updateOrCreate(['id' => $this->mahasiswaId], [
        		'name' => $this->nama,
                'email' => $this->email,
                'password' => bcrypt($this->nim),
        	]);
        	$user->mahasiswa()->updateOrCreate(['id' => $this->mahasiswaId], [
                'nama' => $this->nama,
                'nim' => $this->nim,
                'email' => $this->email,
            ]);
            $user->roles()->sync(2);
            session()->flash('info', $this->mahasiswaId ? 'Mahasiswa Update Successfully' : 'Mahasiswa Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        $this->hideModal();

        $this->mahasiswaId = '';
        $this->nama = '';
        $this->nim = '';
        $this->email = '';
    }

    public function edit($id){
        $mahasiswa = ModelsMahasiswa::findOrFail($id);
        $user = User::findOrFail($id);
        $this->mahasiswaId = $id;
        $this->nama = $mahasiswa->nama;
        $this->nim = $mahasiswa->nim;
        $this->email = $mahasiswa->email;
        $this->showModal();
    }

    public function delete($id){
        try{
    	ModelsMahasiswa::find($id)->delete();
        User::find($id)->delete();

        $this->hideDel();
        
        session()->flash('delete','Mahasiswa Successfully Deleted');
        }
        catch(QueryException $e) {
            $this->hideDel();
            session()->flash('delete','Tidak bisa dihapus');
        }
    }
}
