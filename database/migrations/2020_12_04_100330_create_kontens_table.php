<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontens', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('title')->unique();
            $table->bigInteger('jenis_konten_id')->unsigned();
            $table->char('code');
            $table->char('detail');
            $table->string('image');
            $table->timestamps();

            $table->foreign('jenis_konten_id')->references('id')->on('jeniskontens')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontens');
    }
}
