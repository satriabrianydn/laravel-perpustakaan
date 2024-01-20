<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;

    protected $table = "denda";

    protected $fillable = [
        'id_pinjam',
        'keterlambatan',
        'denda'
    
];
}
