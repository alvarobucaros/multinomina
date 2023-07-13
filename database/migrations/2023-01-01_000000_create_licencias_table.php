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
	Schema::create('licencias', function (Blueprint $table){
        $table->id();
        $table->integer('lic_idEmpresa');
        $table->integer('lic_idEmpleado');
        $table->char('lic_tipo',2);
        $table->date('lic_fechainicio');
        $table->date('lic_fechaFinal');
        $table->char('lic_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('licencias');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:36:34   <<<<<<< 
