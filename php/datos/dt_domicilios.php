<?php
class dt_domicilios extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_domicilio, barrio FROM domicilios ORDER BY barrio";
		return toba::db('SeGeA_2')->consultar($sql);
	}



	function get_listado()
	{
		$sql = "SELECT
			t_d.id_domicilio,
			t_d.barrio,
			t_d.calle,
			t_d.piso,
			t_d.edificio,
			t_d.departamento,
			t_d.numero,
			t_l.nombre_localidad as id_localidad_nombre
		FROM
			domicilios as t_d,
			localidades as t_l
		WHERE
				t_d.id_localidad = t_l.id_localidad
		ORDER BY barrio";
		return toba::db('SeGeA_2')->consultar($sql);
	}


}
?>