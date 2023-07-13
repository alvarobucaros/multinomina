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
	Schema::create('coopfondos', function (Blueprint $table){
        $table->id();
        $table->integer('cof_idEmpresa');
        $table->integer('cof_idEmpleado');
        $table->integer('cof_idTercero');
        $table->decimal('cof_valorTotal',12,2);
        $table->decimal('cof_valorCuota',12,2);
        $table->decimal('cof_saldo',12,2);
        $table->integer('col_plazo');
        $table->date('cof_fechaInicio');
        $table->date('cof_fechaFinal');
        $table->char('cof_periDescuento',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('coopfondos');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 5:18:02   <<<<<<< 
