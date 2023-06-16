<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->constrained('quotation')->onDelete('cascade');
            $table->string('item_code');
            $table->string('item_name');
            $table->string('qty');
            $table->string('price');
            $table->string('total');
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
        Schema::dropIfExists('quotation_detail');
    }
}
