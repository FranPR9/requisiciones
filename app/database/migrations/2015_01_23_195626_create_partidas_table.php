<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partidas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_requisicion')->unsigned();
			$table->foreign('id_requisicion')->references('id')->on('requisiciones');
			$table->text('descripcion');
			$table->double('cantidad_minima');
			$table->string('unidad_medida', 300);
			$table->string('codificacion', 300);
			$table->string('marca', 300);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partidas');
	}

}
