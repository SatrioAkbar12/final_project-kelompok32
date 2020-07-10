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
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pertanyaan');
            $table->text('isi');
            $table->integer('poin_vote');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_pertanyaan')->references('id')->on('pertanyaans');
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
