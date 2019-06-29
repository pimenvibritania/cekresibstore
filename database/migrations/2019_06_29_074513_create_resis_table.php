<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tglOrder');
            $table->string('invoice');
            $table->string('nama');
            $table->string('noHp');
            $table->string('produk');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('alamat');
            $table->string('resi');
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
        Schema::dropIfExists('resis');
    }
}
