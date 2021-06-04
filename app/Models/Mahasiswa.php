<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswas";
    protected $fillable = ['nama', 'nim', 'email'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function krs(){
        return $this->hasMany(Krs::class,'mahasiswa_id','id');
    }
}
