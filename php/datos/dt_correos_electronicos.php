<?php
class dt_correos_electronicos extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_correo_electronico, nombre_correo_electronico FROM correos_electronicos ORDER BY nombre_correo_electronico";
		return toba::db('SeGeA_2')->consultar($sql);
	}

}

?>