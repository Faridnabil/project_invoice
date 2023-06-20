<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spk', function (Blueprint $table) {
            $table->id();
            $table->string('no')->nullable();
            $table->date('tgl');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
            $table->string('ktp');
            $table->string('nama1');
            $table->string('alamat1');
            $table->string('telp1');
            $table->string('ktp1');
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
        Schema::dropIfExists('spk');
    }
}
