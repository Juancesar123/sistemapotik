<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetransaksiobatsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_obats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kd_obat')->unsigned();
            $table->string('qty', 30);
            $table->integer('satuan')->unsigned();
            $table->string('total_harga', 100);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kd_obat')->references('id')->on('dataobats');
            $table->foreign('satuan')->references('id')->on('satuans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaksi_obats');
    }
}
