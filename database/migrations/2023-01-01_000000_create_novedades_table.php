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
	Schema::create('novedades', function (Blueprint $table){
        $table->id();
        $table->integer('nov_idEmpresa');
        $table->integer('nov_idEmpleado');
        $table->integer('nov_idConcepto');
        $table->char('nov_periodo',6);
        $table->integer('nov_cantidad');
        $table->decimal('nov_valor',12,2);
        $table->char('nov_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('novedades');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:36:55   <<<<<<< 
