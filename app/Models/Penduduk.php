<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    public $table = 'penduduk';
    protected $fillable = ['datas_id', 'jumlah_penduduk_laki_laki', 'jumlah_penduduk_perempuan', 'jumlah_penduduk'];

    public function data()
    {
        return $this->belongsTo(Data::class, 'datas_id');
    }
}
