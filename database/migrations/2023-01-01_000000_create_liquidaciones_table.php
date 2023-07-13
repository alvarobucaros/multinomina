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
	Schema::create('liquidaciones', function (Blueprint $table){
        $table->id();
        $table->integer('liq_idEmpresa');
        $table->char('liq_tipo',2);
        $table->date('liq_fechaDesde');
        $table->date('liq_fechaHasta');
        $table->integer('liq_idEmpleado');
        $table->char('liq_periodo',6);
        $table->char('liq_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('liquidaciones');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:36:42   <<<<<<< 
