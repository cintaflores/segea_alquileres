<?php
class dt_localidades extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_localidad, nombre_localidad FROM localidades ORDER BY nombre_localidad";
		return toba::db('SeGeA_2')->consultar($sql);
	}



}
?>