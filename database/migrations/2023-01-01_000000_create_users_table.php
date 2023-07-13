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
	Schema::create('users', function (Blueprint $table){
        $table->id();
        $table->string('name',255);
        $table->string('email',255);
		$table->timestamp('email_verified_at');
        $table->string('password',255);
        $table->string('empresa',100);
        $table->string('direccion',100);
        $table->string('barrio',45)->nullable();
        $table->string('ciudad',45);
        $table->string('codigo',45);
        $table->char('tipodoc',1);
        $table->string('nrodoc',15);
        $table->string('telefono',45);
        $table->char('profile',1);
        $table->char('estado',1);
        $table->string('remember_token',100);
        $table->string('username',45);
        $table->string('en_nombre',100)->nullable();
		$table->timestamps();
    });
}
   /**
    * Reverse the migrations.
    */
 public function down(): void
 {
     Schema::dropIfExists('users');
 }
};
// >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Jul 10, 2023 8:36:21   <<<<<<< 
