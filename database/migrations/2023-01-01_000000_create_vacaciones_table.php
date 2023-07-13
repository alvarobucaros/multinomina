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
	Schema::create('vacaciones', function (Blueprint $table){
        $table->id();
        $table->integer('vac_idEmpresa');
        $table->integer('vac_idEmpleado');
        $table->integer('vac_idLiquidacion');
        $table->date('vac_fechaInicio');
        $table->date('vac_fechaFinal');
        $table->char('vac_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('vacaciones');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:39:59   <<<<<<< 
