<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargalectivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargalectivas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('declaracionjurada_id')->constrained('declaracionjuradas')->onDelete('cascade');
            $table->boolean('estado_asignado')->nullable()->default(false);
            $table->boolean('estado_terminado')->nullable()->default(false);
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
        Schema::dropIfExists('cargalectivas');
    }
}
