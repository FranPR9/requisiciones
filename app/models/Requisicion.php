<?php

class Requisicion extends Eloquent {

	protected $table = 'requisiciones';
	protected $fillable = array('id_dependencia','descripcion','partida_presupuestal', 'codificacion', 'presupuesto', 'origen_recursos', 'procedimiento_adjudicacion', 'tiempo_entrega', 'lugar_entrega', 'garantia', 'asesor', 'cargo_asesor', 'email_asesor', 'dias_pago', 'observaciones', 'requisitos_tecnicos', 'requisitos_economicos', 'requisitos_informativos', 'condiciones_pago', 'datos_facturacion');
}

?>