<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusData extends Model
{
    use HasFactory;
    public $table = 'status_data';
    protected $fillable = ['month', 'year', 'keterangan', 'status'];
}
