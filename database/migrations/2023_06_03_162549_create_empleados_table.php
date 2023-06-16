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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->integer('empl_idEmpresa');
            $table->string('empl_primerNombre',30);
            $table->string('empl_otroNombre',30);
            $table->string('empl_primerApellido',30);
            $table->string('empl_otroApellido',30);
            $table->string('empl_tipodoc',1);
            $table->string('empl_nrodoc',20);
            $table->string('empl_codigo',10);
            $table->string('empl_email',100);
            $table->string('empl_telefono',25);
            $table->string('empl_direccion',100);
            $table->string('empl_ciudad',45);
            $table->date('empl_fechaIngreso');
            $table->date('empl_fechaRetiro');
            $table->string('empl_estado',1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
