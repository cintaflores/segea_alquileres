<?php
class dt_caracteristicas extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_c.id_caracteristica,
			t_c.nombre_caracteristicas
		FROM
			caracteristicas as t_c
		ORDER BY nombre_caracteristicas";
		return toba::db('SeGeA_2')->consultar($sql);
	}


}
?>