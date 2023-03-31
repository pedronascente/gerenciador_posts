<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacoes', function (Blueprint $table) {
            $table->integer('artigo_id')->unsigned();
            $table->foreign('artigo_id')->references('id')->on('artigos')->onDelete('cascade');
            $table->integer('sessao_id')->unsigned();
            $table->foreign('sessao_id')->references('id')->on('sessoes')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['artigo_id', 'sessao_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacoes');
    }
}
