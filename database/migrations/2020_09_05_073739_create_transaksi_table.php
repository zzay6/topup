<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('email');
            $table->integer('auth')->nullable();
            $table->string('provider');
            $table->string('player_id');
            $table->string('player_zona')->nullable();
            $table->string('nickname');
            $table->string('pulsa_code');
            $table->string('nominal');
            $table->decimal('harga');
            $table->string('pembayaran');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
