<?php
class dt_tipos_telefonos extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_telefono, nombre_tipo_telefono FROM tipos_telefonos ORDER BY nombre_tipo_telefono";
		return toba::db('SeGeA_2')->consultar($sql);
	}



}
?>
