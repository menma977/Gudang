<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role'); // 0 : pemilik, 1 : admin, 2 : kepala gudang, 3 : user Gudang, 4 : sales, 5 : soter
            $table->string('name');
            $table->string('username')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->integer('store')->nullable();
            $table->integer('delete')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
