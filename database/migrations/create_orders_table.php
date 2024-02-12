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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id');
            $table->foreignId('train_id');
            $table->string('layout');
            $table->date('checkin');
            $table->date('checkout');
            $table->integer('lama');
            $table->bigInteger('harga');
            $table->string('nama_kegiatan');
            $table->string('status');
            $table->string('special')->nullable();
            $table->string('surat')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
