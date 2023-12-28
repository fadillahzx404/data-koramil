<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    public $table = 'agama';
    protected $fillable = ['datas_id', 'agama', 'jumlah_agama_laki_laki', 'jumlah_agama_perempuan', 'jumlah_agama'];

    public function data()
    {
        return $this->belongsTo(Data::class, 'datas_id');
    }
}
