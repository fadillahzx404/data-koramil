<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartu_Keluarga extends Model
{
    use HasFactory;
    public $table = 'kartu_keluarga';
    protected $fillable = ['datas_id', 'kk_laki_laki', 'kk_perempuan', 'jumlah_kartu_keluarga'];

    public function data()
    {
        return $this->belongsTo(Data::class, 'datas_id');
    }
}
