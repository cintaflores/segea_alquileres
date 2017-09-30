<?php
class dt_tipos_documentos extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_documento, nombre_tipo_documento FROM tipos_documentos ORDER BY nombre_tipo_documento";
		return toba::db('SeGeA_2')->consultar($sql);
	}






}
?>