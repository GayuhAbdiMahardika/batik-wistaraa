<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_supplier')->insert([
            [
                'nama_supplier' => 'PT. Sumber Jaya',
                'kontak' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'CV. Makmur Sentosa',
                'kontak' => '081987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'UD. Sejahtera Abadi',
                'kontak' => '081223344556',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'PT. Mitra Logistik',
                'kontak' => '081334455667',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'CV. Karya Utama',
                'kontak' => '081445566778',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'PT. Indo Berkah',
                'kontak' => '081556677889',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'UD. Sinar Harapan',
                'kontak' => '081667788990',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'CV. Tunas Baru',
                'kontak' => '081778899001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'PT. Multi Makmur',
                'kontak' => '081889900112',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'UD. Berkat Abadi',
                'kontak' => '081990011223',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
