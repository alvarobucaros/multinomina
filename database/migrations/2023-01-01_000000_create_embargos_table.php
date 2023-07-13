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
	Schema::create('embargos', function (Blueprint $table){
        $table->id();
        $table->integer('emb_idEmpresa');
        $table->integer('emb_idEmpleado');
        $table->integer('emb_idTercero');
        $table->decimal('emb_valorCuota',12,2);
        $table->decimal('emb_valorTotal',12,2);
        $table->char('emb_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('embargos');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 5:18:29   <<<<<<< 
