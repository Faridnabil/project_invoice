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
            $table->string('tax');
            $table->string('tax_amount');
            $table->string('sub_total');
            $table->string('amount');
            $table->string('amount_paid')->nullable();
            $table->string('amount_due');
            $table->string('description')->nullable();
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