<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjualan';

    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'jumlah',
        'harga',
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

    public function barang()
    {
        return $this->belongsTo(DataBarang::class);
    }

    public static function topSellingItems($limit = 10)
    {
        return self::selectRaw('barang_id, SUM(jumlah) as total')
            ->groupBy('barang_id')
            ->orderBy('total', 'desc')
            ->limit($limit)
            ->with('barang')
            ->get();
    }
}
