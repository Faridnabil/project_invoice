<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation', function (Blueprint $table) {
            $table->id();
            $table->string('no_quotation')->nullable();
            $table->string('customer_name');
            $table->string('address');
            $table->string('no_hp');
            $table->string('no_ktp');
            $table->string('nama_project');
            $table->string('tanggal_quotation');
            $table->string('tax');
            $table->string('tax_amount');
            $table->string('sub_total');
            $table->string('amount');
            $table->string('amount_due');
            $table->string('description', 10000)->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('quotation');
    }
}
