<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = "peminjaman";
    
    protected $fillable = [
        'nim',
        'nip',
        'tgl_pinjam',
        'tgl_kembali',
        'status'
    ];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'nip');
    }
}
