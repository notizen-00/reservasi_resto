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

        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained('pelanggan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('meja_id')->constrained('meja')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pembayaran_id')->constrained('pembayaran')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nomor_transaksi');
            $table->boolean('status_transaksi');
            $table->integer('total');
            $table->integer('kembalian');
            $table->dateTime('tanggal_reservasi');
            $table->timestamps();
        });

        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('detail_transaksi');
    }
};