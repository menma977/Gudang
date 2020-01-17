<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product')->nullable();
            $table->integer('user')->nullable();
            $table->integer('approved_storehouse')->nullable();
            $table->integer('approved_admin')->nullable();
            $table->text('description');
            $table->integer('income')->default(0);
            $table->integer('outcome')->default(0);
            $table->integer('status'); // 0 : waiting, 1 : accept, 2 : cancel
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
        Schema::dropIfExists('ledger_products');
    }
}
