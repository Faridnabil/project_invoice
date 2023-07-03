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
            $table->foreignId('quotation_id')->constrained('quotation')->onDelete('cascade');
            $table->string('no_inv')->nullable();
            $table->string('status')->nullable();
            $table->string('termin1');
            $table->string('termin2');
            $table->date('issue_date');
            $table->date('due_date');
            $table->string('file_termin1')->nullable();
            $table->string('file_termin2')->nullable();
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
