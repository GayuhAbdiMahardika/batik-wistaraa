<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penjualan')->insert([
            [
                'no_faktur' => 'PJ001',
                'tanggal' => now()->subDays(29),
                'total' => 170000,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_faktur' => 'PJ002',
                'tanggal' => now()->subDays(28),
                'total' => 70000,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('detail_penjualan')->insert([
            [
                'penjualan_id' => 1,
                'barang_id' => 1,
                'jumlah' => 10,
                'harga' => 17000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 2,
                'jumlah' => 5,
                'harga' => 14000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
