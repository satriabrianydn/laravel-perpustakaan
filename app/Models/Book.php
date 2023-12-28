<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'data_buku';

    protected $fillable = [
        'kode_buku',
        'nama_buku',
        'id_penerbit',
        'tanggal_terbit',
        'jumlah_halaman',
        'nama_pengarang',
        'foto_buku',
    ];

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }
}
