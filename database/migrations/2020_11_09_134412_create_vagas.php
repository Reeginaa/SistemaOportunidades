<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->date('vag_data_publicacao');
            $table->date('vag_data_alteracao');
            $table->integer('vag_status')->nullable(true)->default(1);
            $table->integer('vag_carga_horaria');
            $table->string('vag_habilidades', 250);
            $table->string('vag_diferenciais', 250)->nullable(true);
            $table->string('vag_faixa_salarial', 250)->nullable(true);
            $table->string('vag_beneficios', 250)->nullable(true);
            $table->string('vag_informacoes_adicionais', 500)->nullable(true);
            $table->integer('vag_numero_de_vagas');
            $table->integer('vag_cep');
            $table->unsignedBigInteger('cid_id');
            $table->unsignedBigInteger('are_id');
            $table->unsignedBigInteger('div_id');
            $table->unsignedBigInteger('tip_id');
            $table->unsignedBigInteger('fdt_id');
            $table->timestamps();

            $table->foreign('cid_id')->references('id')->on('cidades')->onDelete('restrict');
            $table->foreign('are_id')->references('id')->on('areas')->onDelete('restrict');
            $table->foreign('div_id')->references('id')->on('divulgadores')->onDelete('restrict');
            $table->foreign('tip_id')->references('id')->on('tipo_contratacoes')->onDelete('restrict');
            $table->foreign('fdt_id')->references('id')->on('formato_trabalhos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vagas');
    }
}
