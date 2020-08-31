<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('licensor_id')->unsigned();
            $table->integer('id_item')->unsigned();
            $table->integer('total_borrow');
            $table->tinyinteger('status');
            $table->dateTime('date_borrow')->nullable();
            $table->dateTime('date_return')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_item')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('licensor_id')->references('id')->on('licensors')->onDelete('cascade');  
           
  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrows');
    }
}
