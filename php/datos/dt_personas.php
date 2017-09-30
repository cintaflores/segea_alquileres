<?php
class dt_personas extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_p.id_persona,
			t_p.nombre,
			t_p.apellido,
			t_p.razon_social,
			t_p.dni,
			t_p.cuit_cuil,
			t_p.fecha_nacimiento,
			t_p.vehiculos,
			t_tp.nombre_tipo_persona as id_tipo_persona_nombre,
			t_ti.nombre_tipo_iva as id_tipo_iva_nombre,
			t_td.nombre_tipo_documento as id_tipo_documento_nombre
		FROM
			personas as t_p,
			tipos_personas as t_tp,
			tipos_iva as t_ti,
			tipos_documentos as t_td
		WHERE
				t_p.id_tipo_persona = t_tp.id_tipo_persona
			AND  t_p.id_tipo_iva = t_ti.id_tipo_iva
			AND  t_p.id_tipo_documento = t_td.id_tipo_documento
		ORDER BY nombre";
		return toba::db('SeGeA_2')->consultar($sql);
	}







	function get_descripciones()
	{
		$sql = "SELECT id_persona, nombre FROM personas ORDER BY nombre";
		return toba::db('SeGeA_2')->consultar($sql);
	}





}
?>