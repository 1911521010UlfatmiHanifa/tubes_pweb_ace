<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = "absensis";
    protected $fillable = ['krs_id', 'pertemuan_id', 'jam_masuk', 'jam_keluar', 'durasi'];

    public function pertemuan(){
        return $this->belongsTo(Pertemuan::class);
    }

    public function krs(){
        return $this->belongsTo(Krs::class);
    }
}
