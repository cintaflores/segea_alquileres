<?php
class dt_tipos_propiedades extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_propiedad,nombre_tipo_propiedad FROM tipos_propiedades ORDER BY nombre_tipo_propiedad";
		return toba::db('SeGeA_2')->consultar($sql);
	}



}
?>
