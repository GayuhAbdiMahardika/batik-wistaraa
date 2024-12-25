<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembelian')->insert([
            [
                'no_faktur' => 'PB001',
                'tanggal' => now(),
                'supplier_id' => 1,
                'total' => 850000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_faktur' => 'PB002',
                'tanggal' => now(),
                'supplier_id' => 2,
                'total' => 280000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ...additional entries...
        ]);

        DB::table('detail_pembelian')->insert([
            [
                'pembelian_id' => 1,
                'barang_id' => 1,
                'jumlah' => 50,
                'harga' => 17000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pembelian_id' => 2,
                'barang_id' => 2,
                'jumlah' => 20,
                'harga' => 14000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ...additional entries...
        ]);
    }
}
