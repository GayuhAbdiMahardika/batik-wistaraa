<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPembelian; // Ensure this class exists in the specified namespace

class DataBarang extends Model
{
    use HasFactory;

    protected $table = 'data_barang';

    protected $fillable = [
        'nama_barang',
        'stok',
        'harga',
    ];

    public function detailPembelian()
    {
        return $this->hasMany(DetailPembelian::class, 'barang_id');
    }
}
