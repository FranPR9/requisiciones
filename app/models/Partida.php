<?php

class Partida extends Eloquent {

	protected $table = 'partidas';
	protected $fillable = array('id_requisicion','descripcion','cantidad_minima', 'unidad_medida', 'codificacion', 'marca');
}

?>