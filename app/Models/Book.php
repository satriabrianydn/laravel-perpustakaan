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
        'id_kategori',
        'tanggal_terbit',
        'jumlah_halaman',
        'nama_pengarang',
        'foto_buku',
        'deskripsi',
    ];

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    
}
