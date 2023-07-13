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
Schema::create('acumulados', function (Blueprint $table){
        $table->id();
        $table->integer('acu_idEmpresa');
        $table->integer('acu_idLiquidacion');
        $table->char('acu_periodo',6);
        $table->integer('acu_idEmpleado');
        $table->char('acu_idConcepto',1);
        $table->double('acu_numero',8,2);
        $table->double('acu_valor',12,2);
        $table->char('acu_estado',1);
        $table->timestamps();
                });
        }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('acumulados');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 5:12:59   <<<<<<< 
