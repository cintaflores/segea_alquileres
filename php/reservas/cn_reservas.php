<?php
class cn_reservas extends SeGeA_2_cn
{

	//-----------------------------------------------------------------------------------
	//---- dr_reserva ---------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_reserva')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_reserva')->sincronizar();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_reserva ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function set_reservas($datos)
	{
		$this->dep('dr_reserva')->tabla('dt_reserva')->set($datos);
	}

	function cargar($seleccion)
	{
		$this->dep('dr_reserva')->cargar($seleccion);
	}

	function get_reservas()
	{
		$datos = $this->dep('dr_reserva')->tabla('dt_reserva')->get();
		return $datos;
	}

	function hay_cursor()
	{
		if($this->dep('dr_reserva')->tabla('dt_reserva')->esta_cargada())
		{
			return $this->dep('dr_reserva')->tabla('dt_reserva')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila=$this->dep('dr_reserva')->tabla('dt_reserva')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_reserva')->tabla('dt_reserva')->set_cursor($id_fila);
	}

	function eliminar()
	{
		$this->dep('dr_reserva')->tabla('dt_reserva')->eliminar_todo();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_roles ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_roles($datos)
	{
		$this->dep('dr_reserva')->tabla('dt_roles')->procesar_filas($datos);
	}

	function get_roles()
	{
		$datos = $this->dep('dr_reserva')->tabla('dt_roles')->get_filas();
		return $datos;
	}

	//-----------------------------------------------------------------------------------
	//---- dt_propiedades ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_reservas($datos)
	{
		$this->dep('dr_reserva')->tabla('dt_propiedades')->procesar_filas($datos);
	}

	function get_propiedades()
	{
		$datos = $this->dep('dr_reserva')->tabla('dt_propiedades')->get_filas();
		return $datos;
	}
}
?>
