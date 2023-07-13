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
	Schema::create('parametros', function (Blueprint $table){
        $table->id();
        $table->integer('par_idEmpresa');
        $table->decimal('par_porcCaja',10,2);
        $table->decimal('par_porcICBF',10,2);
        $table->decimal('par_porSENA',10,2);
        $table->decimal('par_porcRiesgos',10,4);
        $table->decimal('par_porcESAP',10,2);
        $table->decimal('par_porcFODE',10,2);
        $table->string('par_fondoRiesgos',45);
        $table->string('par_CajaSubsidio',45);
        $table->string('par_representante',80);
        $table->char('par_tipoDocRepresentante',1);
        $table->string('par_nroDocRepresentante',12);
        $table->string('par_tesorero',80);
        $table->char('par_tipoDocTesorero',1);
        $table->string('par_nroDocTesorero',12);
        $table->decimal('par_festivadiurna',8,2);
        $table->decimal('par_festivanocturna',8,2);
        $table->decimal('par_horasnocturna',8,2);
        $table->decimal('par_horasdiurna',8,2);
        $table->string('par_periodo',6);
        $table->char('par_liquidacion',1);
        $table->decimal('par_smmlv',12,0);
        $table->decimal('par_auxTransporte',12,2);
        $table->integer('par_diasVacaciones');
        $table->integer('par_horasMes');
        $table->timestamps();
        });
 }
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('parametros');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 7:37:06   <<<<<<< 
