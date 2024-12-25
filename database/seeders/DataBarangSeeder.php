<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_barang')->insert([
            [
                'nama_barang' => 'Kopi Kapal Api',
                'stok' => 100,
                'harga' => 17000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Sabun Dove',
                'stok' => 30,
                'harga' => 14000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Pasta Gigi Pepsodent',
                'stok' => 30,
                'harga' => 33000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Teh Botol Sosro',
                'stok' => 50,
                'harga' => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Indomie Goreng',
                'stok' => 200,
                'harga' => 2500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Beras Rojolele',
                'stok' => 100,
                'harga' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Minyak Goreng Bimoli',
                'stok' => 60,
                'harga' => 28000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Gula Pasir',
                'stok' => 80,
                'harga' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Kecap ABC',
                'stok' => 40,
                'harga' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Susu Dancow',
                'stok' => 70,
                'harga' => 45000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Mie Sedap',
                'stok' => 150,
                'harga' => 2200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Tepung Terigu',
                'stok' => 90,
                'harga' => 9000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Susu Kental Manis',
                'stok' => 110,
                'harga' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Roti Tawar',
                'stok' => 50,
                'harga' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Telur Ayam',
                'stok' => 200,
                'harga' => 22000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Margarin Blue Band',
                'stok' => 60,
                'harga' => 8000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Sarden ABC',
                'stok' => 40,
                'harga' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Kopi Good Day',
                'stok' => 100,
                'harga' => 1500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Air Mineral Aqua',
                'stok' => 300,
                'harga' => 3000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Biskuit Roma',
                'stok' => 80,
                'harga' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Kacang Garuda',
                'stok' => 70,
                'harga' => 8000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Coklat SilverQueen',
                'stok' => 50,
                'harga' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Minuman Isotonik Pocari Sweat',
                'stok' => 90,
                'harga' => 7000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
