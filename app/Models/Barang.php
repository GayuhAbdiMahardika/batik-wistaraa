<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'data_barang';

    // Menambahkan properti fillable
    protected $fillable = [
        'nama_barang', 'kategori', 'harga', 'stok'
    ];
}
