<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatedataobatsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataobats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_obat', 50);
            $table->integer('id_satuan')->unsigned();	
            $table->integer('jumlah');
            $table->string('harga', 30);
            $table->string('kode_obat', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_satuan')->references('id')->on('satuans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dataobats');
    }
}
