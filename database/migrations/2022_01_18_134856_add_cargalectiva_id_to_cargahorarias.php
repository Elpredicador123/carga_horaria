<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCargalectivaIdToCargahorarias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cargahorarias', function (Blueprint $table) {
            $table->foreignId('cargalectiva_id')->constrained('cargalectivas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cargahorarias', function (Blueprint $table) {
            //
        });
    }
}
