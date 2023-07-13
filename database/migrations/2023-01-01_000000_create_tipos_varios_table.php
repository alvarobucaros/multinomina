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
	Schema::create('tipos_varios', function (Blueprint $table){
        $table->id();
        $table->integer('tt_idEmpresa');
        $table->char('tt_clase',2);
        $table->char('tt_codigo',10);
        $table->string('tt_descripcion',45);
        $table->char('tt_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('tipos_varios');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:37:27   <<<<<<< 
