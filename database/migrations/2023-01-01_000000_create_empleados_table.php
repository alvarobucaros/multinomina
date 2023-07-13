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
	Schema::create('empleados', function (Blueprint $table){
        $table->id();
        $table->integer('empl_idEmpresa');
        $table->string('empl_primerNombre',45);
        $table->string('empl_otroNombre',45);
        $table->string('empl_primerApellido',45);
        $table->string('empl_otroApellido',45);
        $table->char('empl_tipodoc',1);
        $table->string('empl_nrodoc',20);
        $table->string('empl_codigo',10);
        $table->string('empl_email',100);
        $table->string('empl_telefono',25);
        $table->string('empl_direccion',60);
        $table->string('empl_ciudad',45);
        $table->date('empl_fechaIngreso');
        $table->date('empl_fechaRetiro');
        $table->char('empl_estado',1);
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
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:35:58   <<<<<<< 
