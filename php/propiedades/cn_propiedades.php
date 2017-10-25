<?php
class cn_propiedades extends SeGeA_2_cn
{
	//-----------------------------------------------------------------------------------
	//---- Variables -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	protected $temp_archivo;
	protected $temp_nombre;
	protected $temp_imagen;

	//-----------------------------------------------------------------------------------
	//---- dr_propiedad ---------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_propiedad')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_propiedad')->sincronizar();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_propiedad ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function set_propiedades($datos)
	{
		$this->dep('dr_propiedad')->tabla('dt_propiedad')->set($datos);
	}

	function cargar($seleccion)
	{
		$this->dep('dr_propiedad')->cargar($seleccion);
	}

	function get_propiedades()
	{
		$datos = $this->dep('dr_propiedad')->tabla('dt_propiedad')->get();
		return $datos;
	}

	function hay_cursor()
	{
		if($this->dep('dr_propiedad')->tabla('dt_propiedad')->esta_cargada())
		{
			return $this->dep('dr_propiedad')->tabla('dt_propiedad')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila=$this->dep('dr_propiedad')->tabla('dt_propiedad')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_propiedad')->tabla('dt_propiedad')->set_cursor($id_fila);
	}

	function eliminar()
	{
		$this->dep('dr_propiedad')->tabla('dt_propiedad')->eliminar_todo();
	}

		public function get_blob($datos, $id_fila)
		{
				$html_imagen = null;

				$imagen = $this->dep('dr_propiedad')->tabla('dt_propiedad')->get_blob('imagen', $id_fila);
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
					$datos['imagen'] = '<a href="'.$temp_archivo['url'].'" target="_newtab">'.$html_imagen.' Tama?o de archivo actual: '.$tamano.' kb</a>';
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
					$this->dep('dr_propiedad')->tabla('dt_propiedad')->set_blob('imagen',$imagen, $id_fila);
				}
			}
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
}
?>
