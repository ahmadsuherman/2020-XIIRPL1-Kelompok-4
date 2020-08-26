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
            $table->integer('id_student')->unsigned();
            $table->integer('id_item')->unsigned();
            $table->integer('total_borrow');
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_item')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('id_student')->references('id')->on('users')->onDelete('cascade');  
           
  
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
