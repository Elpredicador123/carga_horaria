<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallecargahorariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecargahorarias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detallecarga_id')->nullable()->constrained('detallecargas')->onDelete('cascade');
            $table->foreignId('detallecargalectiva_id')->nullable()->constrained('detallecargalectivas')->onDelete('cascade');
            $table->foreignId('cargahoraria_id')->constrained('cargahorarias')->onDelete('cascade');
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
            $table->string('dia');
            $table->string('tipo');
            $table->bigInteger('hora_inicio');
            $table->bigInteger('hora_fin');
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
        Schema::dropIfExists('detallecargahorarias');
    }
}
