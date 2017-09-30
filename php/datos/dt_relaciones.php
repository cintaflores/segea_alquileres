<?php
class dt_relaciones extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_relacion, nombre_relacion FROM relaciones ORDER BY nombre_relacion";
		return toba::db('SeGeA_2')->consultar($sql);
	}


}
?>
