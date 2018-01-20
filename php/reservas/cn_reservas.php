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
	//---- dt_detalle_reserva ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_detalle_reservas($datos)
	{
		$this->dep('dr_reserva')->tabla('dt_detalle_reserva')->procesar_filas($datos);
	}

	function get_detalle_reservas()
	{
		$datos = $this->dep('dr_reserva')->tabla('dt_detalle_reserva')->get_filas();
		return $datos;
	}

	//-----------------------------------------------------------------------------------
	//---- dt_persona ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_persona($datos)
	{
		$this->dep('dr_reserva')->tabla('dt_persona')->procesar_filas($datos);
	}

	function get_personas()
	{
		$datos = $this->dep('dr_reserva')->tabla('dt_persona')->get_filas();
		return $datos;
	}

	//-----------------------------------------------------------------------------------
	//---- dt_recomendacion ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_recomendacion($datos)
	{
		$this->dep('dr_persona')->tabla('dt_recomendacion')->procesar_filas($datos);
	}

	function get_recomendacion()
	{
		$datos = $this->dep('dr_persona')->tabla('dt_recomendacion')->get_filas();
		return $datos;
	}
}
?>
