<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'jenisKelamin', 'alamat'];
}
