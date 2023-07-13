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
	Schema::create('conceptos', function (Blueprint $table){
        $table->id();
        $table->integer('cp_idEmpresa');
        $table->char('cp_tipo',1);
        $table->char('cp_codigo',4);
        $table->char('cp_clase',1);        
        $table->string('cp_titulo',100);
        $table->string('cp_descripcion',100);
        $table->date('cp_fechaDesde');
        $table->date('cp_fechaHasta');
        $table->double('cp_valorDefault',8,2);
        $table->double('cp_porcentajeDefault',8,2);        
        $table->string('cp_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('conceptos');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 5:17:54   <<<<<<< 
