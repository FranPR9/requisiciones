<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requisiciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_dependencia')->unsigned();
			$table->foreign('id_dependencia')->references('id')->on('dependencias');
			$table->text('descripcion');
			$table->integer('partida_presupuestal');
			$table->string('codificacion', 300);
			$table->double('presupuesto');
			$table->integer('origen_recursos');
			$table->integer('procedimiento_adjudicacion');
			$table->string('tiempo_entrega', 500);
			$table->string('lugar_entrega', 500);
			$table->string('garantia', 200);
			$table->integer('id_asesor')->unsigned();
			$table->foreign('id_asesor')->references('id')->on('asesores');
			$table->string('dias_pago', 300);
			$table->text('observaciones');
			$table->text('requisitos_tecnicos');
			$table->text('requisitos_economicos');
			$table->text('requisitos_informativos');
			$table->text('condiciones_pago');
			$table->text('datos_facturacion');
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
		Schema::drop('requisiciones');
	}

}
