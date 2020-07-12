<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabans', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('id')->autoIncrement();;
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pertanyaan');
            $table->text('isi');
            $table->integer('poin_vote');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_pertanyaan')->references('id')->on('pertanyaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawabans');
    }
}
