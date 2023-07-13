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
	Schema::create('ingresos', function (Blueprint $table){
        $table->id();
        $table->integer('ing_idEmpresa');
        $table->integer('ing_idEmpleado');
        $table->date('ing_fechaIngreso');
        $table->date('ing_fechaRetiro');
        $table->integer('ing_idCargo');
        $table->integer('ing_idDependencia');
        $table->double('ing_porcARL',8,2);
        $table->integer('ing_EPS');
        $table->integer('ing_AFP');
        $table->integer('ing_ARL');
        $table->char('ing_encargo',1);
        $table->integer('ing_idCargoEncargo');
        $table->string('ing_numeroContrato',20);
        $table->char('ing_estado',1);
        $table->date('ing_fchUltimaVacacion');
        $table->date('ing_fchUltimaCesantia');
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
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:36:25   <<<<<<< 
