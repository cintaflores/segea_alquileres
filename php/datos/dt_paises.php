<?php
class dt_paises extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_p.id_pais,
			t_p.nombre_pais
		FROM
			paises as t_p
		ORDER BY nombre_pais";
		return toba::db('SeGeA_2')->consultar($sql);
	}


	// function get_descripciones()
	// {
	// 	$sql = "SELECT id_pais, nombre_pais FROM paises ORDER BY nombre_pais";
	// 	return toba::db('SeGeA_2')->consultar($sql);
	// }


}
?>
