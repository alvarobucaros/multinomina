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
	Schema::create('dependencias', function (Blueprint $table){
        $table->id();
        $table->integer('dep_idEmpresa');
        $table->string('dep_nombre',45);
        $table->char('dep_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('dependencias');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 5:18:10   <<<<<<< 
