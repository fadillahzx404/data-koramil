<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    public $table = 'datas';
    protected $fillable = ['month', 'year', 'kelurahaan_id', 'laki_laki', 'perempuan', 'jumlah', 'keterangan', 'status'];
    public function kelurahaan()
    {
        return $this->belongsTo(Kelurahaan::class, 'kelurahaan_id', 'id');
    }

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'datas_id');
    }
    public function wajib_ktp()
    {
        return $this->hasMany(Wajib_Ktp::class, 'datas_id');
    }
    public function kartu_keluarga()
    {
        return $this->hasMany(Kartu_Keluarga::class, 'datas_id');
    }
    public function status_perkawinan()
    {
        return $this->hasMany(Status_Perkawinan::class, 'datas_id');
    }
    public function agama()
    {
        return $this->hasMany(Agama::class, 'datas_id');
    }
}
