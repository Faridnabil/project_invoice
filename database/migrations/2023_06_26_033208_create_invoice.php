<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_detail_id')->constrained('quotation_detail')->onDelete('cascade');
            $table->string('no_inv')->nullable();
            $table->string('status')->nullable();
            $table->string('pembayaran');
            $table->date('issue_date');
            $table->date('due_date');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
