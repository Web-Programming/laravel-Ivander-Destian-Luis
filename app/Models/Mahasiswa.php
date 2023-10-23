<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';

    // protected $filable = ['npm' , 'nama']; mengatur kolom yg boleh di isi saat mass input

    // protected $guard = []; mengatur kolom yang tak boleh di isi
}
