<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bast', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spk_id')->constrained('spk')->onDelete('cascade');
            $table->foreignId('invoice_id')->constrained('invoice')->onDelete('cascade');
            $table->string('file')->nullable();
            $table->string('no_bast')->nullable();
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
        Schema::dropIfExists('bast');
    }
}
