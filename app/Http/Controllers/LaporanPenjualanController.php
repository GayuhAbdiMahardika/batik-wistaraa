<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class LaporanPenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with(['kasir', 'detailPenjualan' => function($query) {
            $query->with('barang');
        }])->get()->toArray();

        // var_dump($penjualans);die;
        return view('laporan_penjualan.index', compact('penjualans'));
    }
}
