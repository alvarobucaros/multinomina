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
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->integer('ing_idEmpresa');
            $table->integer('ing_idEmpleado');
            $table->integer('ing_idDependencia');
            $table->integer('ing_idCargo');
            $table->date('ing_fechaIngreso');
            $table->date('ing_fechaRetiro');
            $table->decimal('ing_porcARL', $precision = 10, $scale = 2);
            $table->string('ing_numeroContrato',20);
            $table->integer('ing_EPS');
            $table->integer('ing_AFP');
            $table->string('ing_encargo',1);
            $table->integer('ing_idCargoEncargo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos');
    }
};
