<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $table = "krs";
    protected $fillable = ['kelas_id', 'mahasiswa_id'];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }

    public function absensi(){
        return $this->hasMany(Absensi::class,'krs_id','krs_id');
    }
}
