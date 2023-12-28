<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $table = 'penerbit';

    protected $fillable = [
        'nama_penerbit',
        'alamat_penerbit',
        'email_penerbit',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'id_penerbit');
    }
}
