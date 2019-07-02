<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailresellerAndNameresellerToResis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resis', function (Blueprint $table) {

            $table->string('email_reseller');
            $table->string('nama_reseller');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resis', function (Blueprint $table) {
            $table->dropColumn(['email_reseller','nama_reseller']);
            //
        });
    }
}
