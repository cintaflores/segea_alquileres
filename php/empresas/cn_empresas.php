<?php
class cn_empresas extends SeGeA_2_cn
{

	//-----------------------------------------------------------------------------------
	//---- dr_empresa ---------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_empresa')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_empresa')->sincronizar();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_empresa ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function cargar($seleccion)
	{
		$this->dep('dr_empresa')->cargar($seleccion);
	}

	function hay_cursor()
	{
		if($this->dep('dr_empresa')->tabla('dt_empresa')->esta_cargada())
		{
			return $this->dep('dr_empresa')->tabla('dt_empresa')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila=$this->dep('dr_empresa')->tabla('dt_empresa')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_empresa')->tabla('dt_empresa')->set_cursor($id_fila);
	}

	function eliminar()
	{
		$this->dep('dr_empresa')->tabla('dt_empresa')->eliminar_todo();
	}

	function set_empresas($datos)
		{
			$this->dep('dr_empresa')->tabla('dt_empresa')->set($datos);

			if (is_array($datos['logo'])) {

				$temp_archivo = $datos['logo']['tmp_name'];
				$fp = fopen($temp_archivo, 'rb');
				$this->dep('dr_empresa')->tabla('dt_empresa')->set_blob('logo', $fp);
			}
		}

		function get_empresas()
		{
			$fp_imagen = $this->dep('dr_empresa')->tabla('dt_empresa')->get_blob('logo');

			$datos = $this->dep('dr_empresa')->tabla('dt_empresa')->get();

			if (isset($fp_imagen)) {
				$temp_nombre = 'logo' . $datos['id_empresa'];

				$temp_archivo = toba::proyecto()->get_www_temp($temp_nombre);

				$temp_imagen = fopen($temp_archivo['path'], 'w');
				stream_copy_to_stream($fp_imagen, $temp_imagen);
				fclose($temp_imagen);
				$tamanio_imagen = round(filesize($temp_archivo['path']) / 1024);
				$datos['logo_vista'] = "<img src = '{$temp_archivo['url']}' alt=\"logo\" WIDTH=180 HEIGHT=150 >";
				$datos['logo'] = 'Tamaño foto actual: '.$tamanio_imagen.' KB';
			} else {
				$datos['logo'] = null;
			}

			return $datos;
		}

	//-----------------------------------------------------------------------------------
	//---- dt_telefono ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas($datos)
	{
		$this->dep('dr_empresa')->tabla('dt_telefonos_empresas')->procesar_filas($datos);
	}

	function get_telefono()
	{
		$datos = $this->dep('dr_empresa')->tabla('dt_telefonos_empresas')->get_filas();
		return $datos;
	}

	//-----------------------------------------------------------------------------------
	//---- dt_correos_electronicos ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_correo($datos)
	{
		$this->dep('dr_empresa')->tabla('dt_correos_electronicos_empresas')->procesar_filas($datos);
	}

	function get_correos_electronicos()
	{
		$datos = $this->dep('dr_empresa')->tabla('dt_correos_electronicos_empresas')->get_filas();
		return $datos;
	}

}
?>
