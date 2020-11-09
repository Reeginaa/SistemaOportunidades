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
            $table->id('vag_id');
            $table->timestamp('vag_data_publicacao');
            $table->timestamp('vag_data_alteracao');
            $table->integer('vag_status');
            $table->string('vag_motivo_recusa', 500);
            $table->integer('vag_carga_horaria');
            $table->string('vag_habilidades', 250);
            $table->string('vag_diferenciais', 250);
            $table->float('vag_faixa_salaria');
            $table->string('vag_beneficios', 250);
            $table->string('vag_informacoes_adicionais', 500);
            $table->integer('vag_numero_de_vagas');
            $table->unsignedBigInteger('cid_id')->nullable(false);
            $table->unsignedBigInteger('are_id')->nullable(false);
            $table->unsignedBigInteger('div_id')->nullable(false);
            $table->unsignedBigInteger('tip_id')->nullable(false);
            $table->unsignedBigInteger('fdt_id')->nullable(false);
            $table->timestamps();

            $table->foreign('cid_id')->references('cid_id')->on('cidades')->onDelete('restrict');
            $table->foreign('are_id')->references('are_id')->on('areas')->onDelete('restrict');
            $table->foreign('div_id')->references('div_id')->on('divulgadores')->onDelete('restrict');
            $table->foreign('tip_id')->references('tip_id')->on('tipo_contratacoes')->onDelete('restrict');
            $table->foreign('fdt_id')->references('fdt_id')->on('formato_trabalhos')->onDelete('restrict');
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
