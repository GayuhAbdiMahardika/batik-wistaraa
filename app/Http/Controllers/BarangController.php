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
        ]);

        Barang::create($request->only(['nama_barang', 'harga', 'stok'])); // Menyimpan data ke tabel
        return redirect()->route('barang.show')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form untuk edit data barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id); // Cari data berdasarkan ID
        return view('barang.edit', compact('barang')); // Kirim data ke view
    }

    // Memperbarui data barang di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->only(['nama_barang', 'harga', 'stok'])); // Update data
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
