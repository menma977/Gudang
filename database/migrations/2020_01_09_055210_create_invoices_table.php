<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('approved_user')->nullable();
            $table->string('code');
            $table->integer('product');
            $table->integer('route');
            $table->integer('store');
            $table->text('description');
            $table->integer('debit');
            $table->integer('credit');
            $table->string('total');
            $table->string('over_due');
            $table->integer('status'); // 0 : sales order, 1 : delivery , 2 : account receivable, 3 : paid off , 4 : over due, 5 : return
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
        Schema::dropIfExists('invoices');
    }
}
