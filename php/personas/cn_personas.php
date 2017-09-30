<?php
class cn_personas extends SeGeA_2_cn
{

	//-----------------------------------------------------------------------------------
	//---- dr_persona ---------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_persona')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_persona')->sincronizar();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_persona ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function set_personas($datos)
	{
		$this->dep('dr_persona')->tabla('dt_persona')->set($datos);
	}

	function cargar($seleccion)
	{
		$this->dep('dr_persona')->cargar($seleccion);
	}

	function get_personas()
	{
		$datos = $this->dep('dr_persona')->tabla('dt_persona')->get();
		return $datos;
	}

	function hay_cursor()
	{
		if($this->dep('dr_persona')->tabla('dt_persona')->esta_cargada())
		{
			return $this->dep('dr_persona')->tabla('dt_persona')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila=$this->dep('dr_persona')->tabla('dt_persona')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_persona')->tabla('dt_persona')->set_cursor($id_fila);
	}

	function eliminar()
	{
		$this->dep('dr_persona')->tabla('dt_persona')->eliminar_todo();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_telefono ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas($datos)
	{
		$this->dep('dr_persona')->tabla('dt_telefono')->procesar_filas($datos);
	}

	function get_telefono()
	{
		$datos = $this->dep('dr_persona')->tabla('dt_telefono')->get_filas();
		return $datos;
	}

	//-----------------------------------------------------------------------------------
	//---- dt_correos_electronicos ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_correo($datos)
	{
		$this->dep('dr_persona')->tabla('dt_correos_electronicos')->procesar_filas($datos);
	}

	function get_correos_electronicos()
	{
		$datos = $this->dep('dr_persona')->tabla('dt_correos_electronicos')->get_filas();
		return $datos;
	}

	//-----------------------------------------------------------------------------------
	//---- dt_domicilios ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_domicilios($datos)
	{
		$this->dep('dr_persona')->tabla('dt_domicilio_por_persona')->procesar_filas($datos);
	}

	function get_domicilios()
	{
		$datos = $this->dep('dr_persona')->tabla('dt_domicilio_por_persona')->get_filas();
		return $datos;
	}


	//-----------------------------------------------------------------------------------
	//---- dt_cuentas ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_cuentas($datos)
	{
		$this->dep('dr_persona')->tabla('dt_cuentas')->procesar_filas($datos);
	}

	function get_cuentas()
	{
		$datos = $this->dep('dr_persona')->tabla('dt_cuentas')->get_filas();
		return $datos;
	}


}
?>
