<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('id')->autoIncrement();;
            $table->unsignedBigInteger('id_user');
            $table->string('judul');
            $table->text('isi');
            $table->string('tag');
            $table->integer('id_jawabanTepat')->nullable();
            $table->integer('poin_vote');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaans');
    }
}
