<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallecargalectivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecargalectivas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cargalectiva_id')->constrained('cargalectivas')->onDelete('cascade');
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->foreignId('escuela_id')->constrained('escuelas')->onDelete('cascade');
            $table->foreignId('seccion_id')->constrained('secciones')->onDelete('cascade');
            $table->foreignId('ciclo_id')->constrained('ciclos')->onDelete('cascade');
            $table->bigInteger('numero_alumnos')->nullable()->default(0);
            $table->bigInteger('horas_teoria')->nullable()->default(0);
            $table->bigInteger('grupos_teoria')->nullable()->default(0);
            $table->bigInteger('horas_practica')->nullable()->default(0);
            $table->bigInteger('grupos_practica')->nullable()->default(0);
            $table->bigInteger('horas_laboratorio')->nullable()->default(0);
            $table->bigInteger('grupos_laboratorio')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallecargalectivas');
    }
}
