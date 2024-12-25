<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $cart_jual = session()->get('cart_jual', []);
        $total = array_sum(array_column($cart_jual, 'total'));
        $no_faktur = $this->generateNoFaktur();
        return view('penjualan.create', compact('cart_jual', 'total', 'no_faktur'));
    }

    private function generateNoFaktur()
    {
        $lastPenjualan = Penjualan::orderBy('created_at', 'desc')->first();
        $lastNumber = $lastPenjualan ? intval(substr($lastPenjualan->no_faktur, -4)) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        return 'PJ' . date('ymd') . $newNumber;
    }

    public function pilihproduk()
    {
        $products = DataBarang::all()->toArray();
        $cart_jual = session()->get('cart_jual', []);
        $cek = array_column($cart_jual, 'id');
        $cek = array_fill_keys($cek, 1);
        return view('penjualan.produk', compact('products', 'cek'));
    }

    public function addToSessionPenjualan(Request $request)
    {
        $product = DataBarang::find($request->id);
        if ($product) {
            session()->push('cart_jual', [
                'id' => $product->id,
                'nama_barang' => $product->nama_barang,
                'stok' => $product->stok,
                'jumlah' => 1,
                'harga' => $product->harga,
                'total' => $product->harga,
            ]);
            return response()->json(['success' => 'Product added to session']);
        }
        return response()->json(['error' => 'Product not found'], 404);
    }

    public function reset()
    {
        session()->forget('cart_jual');
        return redirect()->route('jual');
    }

    public function removeFromSession(Request $request)
    {
        $cart = session()->get('cart_jual', []);
        foreach ($cart as $key => $item) {
            if ($item['id'] == $request->id) {
                unset($cart[$key]);
                session()->put('cart_jual', $cart);
                return response()->json(['success' => 'Product removed from session']);
            }
        }
        return response()->json(['error' => 'Product not found in session'], 404);
    }

    public function editSession(Request $request)
    {
        $cart = session()->get('cart_jual', []);
        foreach ($cart as $key => $item) {
            if ($item['id'] == $request->id && $request->jumlah > 0 && $request->jumlah != $item['jumlah']) {
                $product = DataBarang::find($item['id']);
                if ($product) {
                    $cart[$key]['jumlah'] = $request->jumlah;
                    $cart[$key]['harga'] = $product->harga;
                    $cart[$key]['total'] = $request->jumlah * $product->harga;
                    session()->put('cart_jual', $cart);
                    return response()->json(['success' => 'Product updated in session']);
                }
            }
        }
        return response()->json(['error' => 'Product not found in session'], 404);
    }

    public function jual(Request $request)
    {
        $request->validate([
            'no_faktur' => 'required|string|max:255|distinct',
        ], [
            'no_faktur.required' => 'Kolom No Faktur wajib diisi.',
            'no_faktur.string' => 'Kolom No Faktur harus berupa string.',
            'no_faktur.max' => 'Kolom No Faktur tidak boleh lebih dari 255 karakter.',
            'no_faktur.distinct' => 'Kolom No Faktur harus unik.',
        ]);

        if (Penjualan::where('no_faktur', $request->no_faktur)->exists()) {
            return redirect()->route('jual')->with('error', 'No Faktur sudah ada.');
        }

        $cart = session()->get('cart_jual', []);
        if (count($cart) == 0) {
            return redirect()->route('jual')->with('error', 'Pilih product terlebih dahulu.');
        }

        $total = array_sum(array_column($cart, 'total'));

        $penjualan = new Penjualan();
        $penjualan->no_faktur = $request->no_faktur;
        $penjualan->tanggal = now();
        $penjualan->total = $total;
        $penjualan->user_id = Auth::id();
        $penjualan->save();

        foreach ($cart as $item) {
            $penjualan->detailPenjualan()->create([
                'barang_id' => $item['id'],
                'jumlah' => $item['jumlah'],
                'harga' => $item['harga'],
            ]);

            $barang = DataBarang::find($item['id']);
            if ($barang) {
                $barang->stok -= $item['jumlah'];
                $barang->save();
            }
        }

        session()->forget('cart_jual');

        return redirect()->route('jual')->with('success', 'Penjualan berhasil');
    }

    public function show(Penjualan $penjualan)
    {
        return view('penjualan.show', compact('penjualan'));
    }

    public function edit(Penjualan $penjualan)
    {
        return view('penjualan.edit', compact('penjualan'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'no_faktur' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'status' => 'nullable|string|max:255',
        ]);

        $penjualan->update($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan updated successfully.');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan deleted successfully.');
    }

    
}
