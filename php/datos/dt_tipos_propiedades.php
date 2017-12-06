<?php
class dt_tipos_propiedades extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_propiedad, descripcion FROM tipos_propiedades ORDER BY descripcion";
		return toba::db('SeGeA_2')->consultar($sql);
	}





}
?>