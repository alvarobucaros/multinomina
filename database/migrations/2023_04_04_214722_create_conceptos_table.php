<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conceptos', function (Blueprint $table) {
            $table->id();
            $table->integer('cp_idEmpresa');
            $table->string('cp_tipo',1);
            $table->string('cp_titulo',100);
            $table->string('cp_descripcion',100);
            $table->double('cp_valorDefault', 8, 2);
            $table->double('cp_porcentajeDefault', 8, 2);
            $table->string('cp_estado',1);     
            $table->date('cp_fechaDesde');
            $table->date('cp_fechaHasta');
            $table->timestamps();
        });
    }
             
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conceptos');
    }
};
