<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Supplier;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::all();
        return view('pembelian.index', compact('pembelians'));
    }

    public function create()
    {
        $suppliers = Supplier::all()->toArray();
        $cart_beli = session()->get('cart_beli', []);
        $total = array_sum(array_column($cart_beli, 'total'));
        return view('pembelian.create', compact('suppliers', 'cart_beli','total'));
    }

    public function pilihproduk()
    {
        $products = DataBarang::all()->toArray();
        $cart_beli = session()->get('cart_beli', []);
        $cek = array_column($cart_beli, 'id');
        $cek = array_fill_keys($cek, 1);
        return view('pembelian.produk', compact('products','cek'));
    }

    public function addToSession(Request $request)
    {
        $product = DataBarang::find($request->id);
        if ($product) {
            session()->push('cart_beli', [
                'id' => $product->id,
                'nama_barang' => $product->nama_barang,
                'stok' => $product->stok,
                'jumlah' => 1,
                'harga' => $product->harga,
                'total' => $product->harga,
                'margin' => 10,
                'harga_jual' => 10 * $product->harga / 100 + $product->harga,
            ]);
            return response()->json(['success' => 'Product added to session']);
        }
        return response()->json(['error' => 'Product not found'], 404);
    }

    public function reset()
    {
        session()->forget('cart_beli');
        return redirect()->route('beli');
    }

    public function removeFromSession(Request $request)
    {
        $cart = session()->get('cart_beli', []);
        foreach ($cart as $key => $item) {
            if ($item['id'] == $request->id) {
                unset($cart[$key]);
                session()->put('cart_beli', $cart);
                return response()->json(['success' => 'Product removed from session']);
            }
        }
        return response()->json(['error' => 'Product not found in session'], 404);
    }

    public function editSession(Request $request)
    {
        $cart = session()->get('cart_beli', []);
        foreach ($cart as $key => $item) {
            if ($item['id'] == $request->id && $request->jumlah > 0 && $request->jumlah != $item['jumlah']) {
                $cart[$key]['jumlah'] = $request->jumlah;
                $cart[$key]['total'] = $request->jumlah * $cart[$key]['harga'];
                session()->put('cart_beli', $cart);
                return response()->json(['success' => 'Product updated in session']);
            }elseif($request->harga > 0 && $request->harga != $item['harga'] && $item['id'] == $request->id){
                $cart[$key]['harga'] = $request->harga;
                $cart[$key]['total'] = $cart[$key]['jumlah'] * $request->harga;
                $cart[$key]['harga_jual'] = $cart[$key]['margin'] * $request->harga / 100 + $request->harga;
                session()->put('cart_beli', $cart);
                return response()->json(['success' => 'Product updated in session']);
            }elseif($request->margin > 0 && $request->margin != $item['margin'] && $item['id'] == $request->id){
                $cart[$key]['margin'] = $request->margin;
                $cart[$key]['harga_jual'] = $request->margin * $cart[$key]['harga'] / 100 + $cart[$key]['harga'];
                session()->put('cart_beli', $cart);
                return response()->json(['success' => 'Product updated in session']);
            }
        }
        return response()->json(['error' => 'Product not found in session'], 404);
    }

    public function beli(Request $request)
    {
        $request->validate([
            'no_faktur' => 'required|string|max:255|distinct',
            'tanggal' => 'required|date',
            'supplier_id' => 'required',
        ], [
            'no_faktur.required' => 'Kolom No Faktur wajib diisi.',
            'no_faktur.string' => 'Kolom No Faktur harus berupa string.',
            'no_faktur.max' => 'Kolom No Faktur tidak boleh lebih dari 255 karakter.',
            'no_faktur.distinct' => 'Kolom No Faktur harus unik.',
            'tanggal.required' => 'Kolom Tanggal wajib diisi.',
            'tanggal.date' => 'Kolom Tanggal harus berupa tanggal yang valid.',
            'supplier_id.required' => 'Kolom Supplier wajib diisi.',
        ]);

        if (Pembelian::where('no_faktur', $request->no_faktur)->exists()) {
            return redirect()->route('beli')->with('error', 'No Faktur sudah ada.');
        }

        $cart = session()->get('cart_beli', []);
        if (count($cart) == 0) {
            return redirect()->route('beli')->with('error', 'Pilih product terlebih dahulu.');
        }

        $total = array_sum(array_column($cart, 'total'));

        $pembelian = new Pembelian();
        $pembelian->no_faktur = $request->no_faktur;
        $pembelian->tanggal = date('Y-m-d', strtotime($request->tanggal));
        $pembelian->supplier_id = $request->supplier_id;
        $pembelian->total = $total;
        $pembelian->save();

        foreach ($cart as $item) {
            $pembelian->detailPembelian()->create([
                'barang_id' => $item['id'],
                'jumlah' => $item['jumlah'],
                'harga' => $item['harga'],
                // 'total' => $item['total'],
                // 'margin' => $item['margin'],
                // 'harga_jual' => $item['harga_jual'],
            ]);

            $barang = DataBarang::find($item['id']);
            if ($barang) {
                $barang->stok += $item['jumlah'];
                $barang->harga = $item['harga_jual'];
                $barang->save();
            }
        }

        session()->forget('cart_beli');

        return redirect()->route('beli')->with('success', 'Pembelian berhasil');
    }

    public function show(Pembelian $pembelian)
    {
        return view('pembelian.show', compact('pembelian'));
    }

    public function edit(Pembelian $pembelian)
    {
        return view('pembelian.edit', compact('pembelian'));
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'no_faktur' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'status' => 'nullable|string|max:255',
        ]);

        $pembelian->update($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Pembelian updated successfully.');
    }

    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian deleted successfully.');
    }
}
