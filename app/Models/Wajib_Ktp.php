<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wajib_Ktp extends Model
{
    use HasFactory;
    public $table = 'wajib_ktp';
    protected $fillable = ['datas_id', 'wajib_ktp_laki_laki', 'wajib_ktp_perempuan', 'jumlah_wajib_ktp'];

    public function data()
    {
        return $this->belongsTo(Data::class, 'datas_id');
    }
}
