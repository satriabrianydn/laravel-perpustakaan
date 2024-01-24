<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admin";

    protected $fillable = [
        'user_id',
        'nip',
        'gender',
        'alamat',
        'no_telp',
        'avatar'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
