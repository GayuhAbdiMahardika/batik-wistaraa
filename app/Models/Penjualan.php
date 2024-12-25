<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'no_faktur',
        'tanggal',
        'total',
        'user_id',
    ];

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'penjualan_id','id');
    }

    public function kasir()
    {
        return $this->hasOne(DataUser::class, 'id', 'user_id');
    }
}