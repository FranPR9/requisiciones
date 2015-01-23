<?php

class Dependencia extends Eloquent {

	protected $table = 'dependencias';
	protected $fillable = array('calle','numero_exterior','numero_interior', 'colonia', 'municipio', 'lada', 'telefono', 'siglas', 'titular', 'cargo_titular', 'autoriza', 'cargo_autoriza', 'valida', 'cargo_valida');
}

?>