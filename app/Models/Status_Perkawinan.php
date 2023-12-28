<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_Perkawinan extends Model
{
    use HasFactory;
    public $table = 'status_perkawinan';
    protected $fillable = ['datas_id', 'status_perkawinan', 'jumlah_status_laki_laki', 'jumlah_status_perempuan', 'jumlah_status_perkawinan'];

    public function data()
    {
        return $this->belongsTo(Data::class, 'datas_id');
    }
}
