<?php
class dt_tipos_iva extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_iva, nombre_tipo_iva FROM tipos_iva ORDER BY nombre_tipo_iva";
		return toba::db('SeGeA')->consultar($sql);
	}



}
?>
