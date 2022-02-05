<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallecargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cargalectiva_id')->constrained('cargalectivas')->onDelete('cascade');
            $table->foreignId('carga_id')->constrained('cargas')->onDelete('cascade');
            $table->string('descripcion')->nullable()->default('');
            $table->bigInteger('cantidad_horas')->nullable()->default(0);
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
        Schema::dropIfExists('detallecargas');
    }
}
