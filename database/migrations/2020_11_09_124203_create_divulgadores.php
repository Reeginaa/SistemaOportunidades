<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivulgadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divulgadores', function (Blueprint $table) {
            $table->id();
            $table->string('div_cnpj', 18)->nullable(false)->unique();
            $table->string('div_nome', 100);
            $table->string('div_telefone', 15);
            $table->string('div_email', 100);
            $table->string('div_rua', 100);
            $table->string('div_numero', 10)->default('SN');
            $table->string('div_complemento', 15)->nullable(true);
            $table->string('div_bairro', 30);
            $table->unsignedBigInteger('cid_id')->unsigned();
            $table->timestamps();

            $table->foreign('cid_id')->references('id')->on('cidades')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divulgadores');
    }
}