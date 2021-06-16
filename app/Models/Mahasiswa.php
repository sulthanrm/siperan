<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['nama','email','jenis_kelamin', 'alamat', 'kategori','listbarang', 'foto'];
}
