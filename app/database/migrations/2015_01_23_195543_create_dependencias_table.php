<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dependencias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('calle', 300);
			$table->string('numero_exterior', 100);
			$table->string('numero_interior', 100);
			$table->string('colonia', 300);
			$table->string('municipio', 300);
			$table->string('lada', 10);
			$table->string('telefono', 20);
			$table->string('siglas', 20);
			$table->string('titular', 500);
			$table->string('cargo_titular', 500);
			$table->string('autoriza', 500);
			$table->string('cargo_autoriza', 500);
			$table->string('valida', 500);
			$table->string('cargo_valida', 100);
			$table->timestamps();
			//¿Qué papel tienen los asesores en el sistema? esos mismos serían usuarios?
			//Deben saber que usuario hizo tal requisición
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dependencias');
	}

}
