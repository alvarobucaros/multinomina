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
	Schema::create('horas_extras', function (Blueprint $table){
        $table->id();
        $table->integer('hex_idEmpresa');
        $table->integer('hex_idEmpleado');
        $table->char('hex_periodo',6);
        $table->integer('hex_diurnas');
        $table->integer('hex_nocturnas');
        $table->integer('hex_festivasDiurna');
        $table->integer('hex_festivasNocturna');
        $table->char('hex_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('horas_extras');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:36:15   <<<<<<< 
