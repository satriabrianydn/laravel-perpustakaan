<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'kategori'
    ];

    public function buku()
    {
        return $this->hasMany(Book::class, 'id_kategori');
    }
}
