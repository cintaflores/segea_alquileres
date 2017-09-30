<?php
class dt_tipos_personas extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_persona, nombre_tipo_persona FROM tipos_personas ORDER BY nombre_tipo_persona";
		return toba::db('SeGeA_2')->consultar($sql);
	}






}
?>