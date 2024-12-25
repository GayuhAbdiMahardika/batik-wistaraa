<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;

class LaporanPembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::with(['supplier', 'detailPembelian' => function($query) {
            $query->with('barang');
        }])->get()->toArray();
        return view('laporan_pembelian.index', compact('pembelians'));
    }
}
