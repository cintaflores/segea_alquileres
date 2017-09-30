<?php
class dt_empresa_telefonicas extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_empresa_telefonica, nombre_empresa_telefonica FROM empresa_telefonicas ORDER BY nombre_empresa_telefonica";
		return toba::db('SeGeA_2')->consultar($sql);
	}



}
?>
