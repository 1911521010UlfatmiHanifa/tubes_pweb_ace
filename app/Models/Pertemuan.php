<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;

    protected $table = "pertemuans";
    protected $fillable = ['kelas_id','pertemuan_id', 'pertemuan_ke', 'tanggal', 'materi'];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function absensi(){
        return $this->hasMany(Absensi::class,'pertemuan_id','pertemuan_id');
    }
}
