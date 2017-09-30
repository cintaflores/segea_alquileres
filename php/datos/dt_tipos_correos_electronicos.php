<?php
class dt_tipos_correos_electronicos extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_correo_electronico, nombre_tipo_correo_electronico FROM tipos_correos_electronicos ORDER BY nombre_tipo_correo_electronico";
		return toba::db('SeGeA_2')->consultar($sql);
	}



}
?>
