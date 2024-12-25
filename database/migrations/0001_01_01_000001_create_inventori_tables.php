<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Inventori
        Schema::create('data_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('stok');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });

        Schema::create('data_supplier', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->string('kontak');
            $table->timestamps();
        });

        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('data_supplier');
            $table->date('tanggal');
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });

        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembelian_id')->constrained('pembelian');
            $table->foreignId('barang_id')->constrained('data_barang');
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelian');
        Schema::dropIfExists('pembelian');
        Schema::dropIfExists('data_barang');
        Schema::dropIfExists('data_supplier');
    }
};