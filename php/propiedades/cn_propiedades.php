<?php
class cn_propiedades extends SeGeA_2_cn
{
	//-----------------------------------------------------------------------------------
	//---- Variables -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	protected $temp_archivo;
	protected $temp_nombre;
	protected $temp_imagen;

	//----------------------------------------------------------------------------
	//---- fotos -----------------------------------------------------------------
	//----------------------------------------------------------------------------

	function get_fotos()
	{
		$datos = $this->dep('dr_propiedad')->tabla('dt_fotos')->get_filas();
		return $datos;
	}

	function procesar_filas_fotos($datos)
	{
		$this->dep('dr_propiedad')->tabla('dt_fotos')->procesar_filas($datos);
	}

	// //----------------------------------------------------------------------------
	// //---- blobs -----------------------------------------------------------------
	// //----------------------------------------------------------------------------
	//
	// function get_blobs_fotos($datos)
	// {
	// 	$datos_r = array();
	// 	foreach ($datos as $key => $value) {
  //     if (isset($value['x_dbr_clave'])) { // En lugar de usar $key como clave vamos a user x_dbr_clave porque en el caso de fotos_telefonos $key y x_dbr_clave no coinciden
  //       $datos_r[$key] = $this->get_blob_fila($value, $value['x_dbr_clave']);
  //     } else {
  //       toba::logger()->notice('ADVERTENCIA-ATENCION: get_blobs_fotos no esta implementado para registros sin x_dbr_clave por el momento. Ver en cn_personas_tab.php=>get_blobs_fotos() [ref_1x0]');
  //       $datos_r[$key] = $value;
  //     }
	// 	}
	// 	return $datos_r;
	// }
	//
	// function get_blob_fila($datos, $id_fila)
	// {
	// 	$html_imagen = null;
	//
	// 	$imagen = $this->dep('dr_propiedad')->tabla('dt_fotos')->get_blob('imagen', $id_fila);
	// 	if (isset($imagen)) {
	// 		$temp_nombre = md5(uniqid(time()));
	// 		$temp_archivo = toba::proyecto()->get_www_temp($temp_nombre);
	// 		$temp_imagen = fopen($temp_archivo['path'], 'w');
	// 		stream_copy_to_stream($imagen, $temp_imagen);
	// 		fclose($temp_imagen);
	// 		//fclose($imagen); Quito esta instruccion porque da problemas al recargar el form
	// 		$tamano = round(filesize($temp_archivo['path']) / 1024);
	// 		$html_imagen =
	// 			"<img width=\"24px\" src='{$temp_archivo['url']}' alt='' />";
	// 		$datos['imagen'] = '<a href="'.$temp_archivo['url'].'" target="_newtab">'.$html_imagen.' Tamaño de archivo actual: '.$tamano.' kb</a>';
	// 		$datos['imagen'.'?html'] = $html_imagen;
	// 		$datos['imagen'.'?url'] = $temp_archivo['url'];
	// 	} else {
	// 		$datos['imagen'] = null;
	// 	}
	//
	// 	return $datos;
	// }
	//
	// function set_blob_fila($datos, $id_fila)
	// {
	// 	if (isset($datos['imagen'])) {
	// 		if (is_array($datos['imagen'])) {
	// 			$temp_archivo = $datos['imagen']['tmp_name'];
	// 			$imagen = fopen($temp_archivo, 'rb');
	// 			$this->dep('dr_propiedad')->tabla('dt_fotos')->set_blob('imagen', $imagen, $id_fila);
	// 		}
	// 	}
	// }
	//
	// function set_blobs_fotos($datos)
	// {
	// 	foreach ($datos as $key => $value) {
	// 		$this->set_blob_fila($datos[$key], $key);
	// 	}
	// }
	public function get_blob($datos, $id_fila)
	{
			$html_imagen = null;

			$imagen = $this->dep('dr_propiedad')->tabla('dt_fotos')->get_blob('imagen', $id_fila);
				if (isset($imagen)) {
				$temp_nombre = md5(uniqid(time()));
				$temp_archivo = toba::proyecto()->get_www_temp($temp_nombre);
				$temp_imagen = fopen($temp_archivo['path'], 'w');
				stream_copy_to_stream($imagen, $temp_imagen);
				fclose($temp_imagen);
				fclose($imagen);
				$tamano = round(filesize($temp_archivo['path']) / 1024);
				$html_imagen =
				"<img width=\"24px\" src='{$temp_archivo['url']}' alt='' />";
				$datos['imagen'] = '<a href="'.$temp_archivo['url'].'" target="_newtab">'.$html_imagen.' Tamaño de archivo actual: '.$tamano.' kb</a>';
				$datos['imagen'.'?html'] = $html_imagen;
			  $datos['imagen'.'?url'] = $temp_archivo['url'];
			} else {
				$datos['imagen'] = null;
			}

			return $datos;
	}

	function get_blobs($datos)
	{
			$datos_r = array();
			foreach ($datos as $key => $value) {
			$datos_r[$key] = $this->get_blob($datos[$key], $key);
			}
			return $datos_r;
	}

	function set_blobs($datos)
	{
			foreach ($datos as $key => $value) {
				$this->set_blob($datos[$key], $key);
			}
	}

	public function set_blob($datos, $id_fila)
	{
		if (isset($datos['imagen'])) {
			if (is_array($datos['imagen'])) {
				$temp_archivo = $datos['imagen']['tmp_name'];
				$imagen = fopen($temp_archivo, 'rb');
				$this->dep('dr_propiedad')->tabla('dt_fotos')->set_blob('imagen',$imagen, $id_fila);
			}
		}
	}

	//----------------------------------------------------------------------------
	//---- dr_propiedad ----------------------------------------------------------
	//----------------------------------------------------------------------------

	function sincronizar()
	{
		$this->dep('dr_propiedad')->sincronizar();
	}

	function resetear()
	{
		$this->dep('dr_propiedad')->resetear();
	}

	function hay_cursor()
	{
		if ($this->dep('dr_propiedad')->tabla('dt_propiedad')->esta_cargada()) {
			return $this->dep('dr_propiedad')->tabla('dt_propiedad')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila = $this->dep('dr_propiedad')->tabla('dt_propiedad')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_propiedad')->tabla('dt_propiedad')->set_cursor($id_fila);
	}

	function cargar($seleccion)
	{
		$this->dep('dr_propiedad')->cargar($seleccion);
	}

	function get_propiedad()
	{
		$datos = $this->dep('dr_propiedad')->tabla('dt_propiedad')->get();
		return $datos;
	}

	function set_propiedad($datos)
	{
		$this->dep('dr_propiedad')->tabla('dt_propiedad')->set($datos);
	}

	function eliminar()
	{
		$this->dep('dr_propiedad')->tabla('dt_propiedad')->eliminar_todo();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_domicilios ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_domicilios($datos)
	{
		$this->dep('dr_propiedad')->tabla('dt_domicilio_por_propiedad')->procesar_filas($datos);
	}

	function get_domicilios()
	{
		$datos = $this->dep('dr_propiedad')->tabla('dt_domicilio_por_propiedad')->get_filas();
		return $datos;
	}

	//-----------------------------------------------------------------------------------
	//---- dt_caracteristicas ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_caracteristicas($datos)
	{
		$this->dep('dr_propiedad')->tabla('dt_caracteristicas_por_propiedad')->procesar_filas($datos);
	}

	function get_caracteristicas()
	{
		$datos = $this->dep('dr_propiedad')->tabla('dt_caracteristicas_por_propiedad')->get_filas();
		return $datos;
	}

	//-----------------------------------------------------------------------------------
	//---- dt_boletas ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_boletas($datos)
	{
		$this->dep('dr_propiedad')->tabla('dt_boletas_servicios')->procesar_filas($datos);
	}

	function get_boletas()
	{
		$datos = $this->dep('dr_propiedad')->tabla('dt_boletas_servicios')->get_filas();
		return $datos;
	}
}

?>
