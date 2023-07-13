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
	Schema::create('terceros', function (Blueprint $table){
        $table->id();
        $table->integer('ter_idEmpresa');
        $table->integer('ter_idTipoTercero');
        $table->string('ter_nombre',100);
        $table->string('ter_direccion',100);
        $table->string('ter_ciudad',45);
        $table->string('ter_email',100);
        $table->char('ter_tipoDoc',1);
        $table->string('ter_nroDoc',20);
        $table->string('ter_telefono',100);
        $table->char('ter_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('terceros');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:37:19   <<<<<<< 
