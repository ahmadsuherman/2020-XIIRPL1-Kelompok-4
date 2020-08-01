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
            $table->timestamps();

            $table->foreign('id_student')->references('id')->on('students')->onDelete('restrict');
            $table->foreign('id_item')->references('id')->on('borrows')->onDelete('restrict');
            $table->engine = 'InnoDB';
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
