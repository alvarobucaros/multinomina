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
	Schema::create('empresas', function (Blueprint $table){
        $table->id();
        $table->string('em_nombre',100);
        $table->string('em_direccion',100);
        $table->string('em_ciudad',100);
        $table->string('em_tipodoc',1);
        $table->string('em_nrodoc',10);
        $table->string('em_telefono',50);
        $table->string('em_email',100);
        $table->string('em_observaciones',128)->nullable();
        $table->date('em_fchini');
        $table->date('em_fchfin');
        $table->string('em_estado',1);
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('empresas');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:36:07   <<<<<<< 
