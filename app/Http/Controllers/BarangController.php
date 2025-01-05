<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan semua data barang
    public function index()
    {
        $data = Barang::all(); // Mengambil semua data dari tabel data_barang
        return view('barang.show', compact('data')); // Kirim data ke view
    }

    // Menampilkan form untuk menambah barang baru
    public function create()
    {
        return view('barang.create');
    }

    // Menyimpan data barang baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('gambar')->store('images', 'public');
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $path,
        ]); // Menyimpan data ke tabel
        return redirect()->route('barang.show')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form untuk edit data barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id); // Cari data berdasarkan ID
        // var_dump($barang);die;
        return view('barang.edit', compact('barang')); // Kirim data ke view
    }

    // Memperbarui data barang di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = Barang::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $barang->update($request->only(['nama_barang', 'harga', 'stok']) + ['gambar' => $path]);
        } else {
            $barang->update($request->only(['nama_barang', 'harga', 'stok']));
        }
        return redirect()->route('barang.show')->with('success', 'Barang berhasil diperbarui.');
    }

    // Menghapus data barang dari database
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete(); // Hapus data
        return redirect()->route('barang.show')->with('success', 'Barang berhasil dihapus.');
    }
}
