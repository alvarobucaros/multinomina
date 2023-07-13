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
Schema::create('cargos', function (Blueprint $table){
        $table->id();
        $table->integer('car_idEmpresa');
        $table->string('car_nombre',45);
        $table->integer('car_nroOcupados');
        $table->integer('car_nroVacantes');
        $table->char('car_otrosFactores',1);
        $table->integer('car_tipo');
        $table->char('car_estado',1);
        $table->decimal('car_salario',12,0);
        $table->timestamps();
                });
        }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('cargos');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 5:13:07   <<<<<<< 
