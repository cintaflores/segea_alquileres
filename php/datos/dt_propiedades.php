<?php
class dt_propiedades extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_p.id_propiedad,
			t_p.nombre_propiedad,
			t_tp.descripcion as id_tipo_propiedad_nombre,
			t_p.id_persona
		FROM
			propiedades as t_p,
			tipos_propiedades as t_tp
		WHERE
				t_p.id_tipo_propiedad = t_tp.id_tipo_propiedad
		ORDER BY nombre_propiedad";
		return toba::db('SeGeA_2')->consultar($sql);
	}

}

?>