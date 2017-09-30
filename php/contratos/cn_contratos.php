<?php
class cn_contratos extends SeGeA_2_cn
{

	//-----------------------------------------------------------------------------------
	//---- dr_contrato ---------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_contrato')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_contrato')->sincronizar();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_contrato ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function set_contratos($datos)
	{
		$this->dep('dr_contrato')->tabla('dt_contrato')->set($datos);
	}

	function cargar($seleccion)
	{
		$this->dep('dr_contrato')->cargar($seleccion);
	}

	function get_contratos()
	{
		$datos = $this->dep('dr_contrato')->tabla('dt_contrato')->get();
		return $datos;
	}

	function hay_cursor()
	{
		if($this->dep('dr_contrato')->tabla('dt_contrato')->esta_cargada())
		{
			return $this->dep('dr_contrato')->tabla('dt_contrato')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila=$this->dep('dr_contrato')->tabla('dt_contrato')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_contrato')->tabla('dt_contrato')->set_cursor($id_fila);
	}

	function eliminar()
	{
		$this->dep('dr_contrato')->tabla('dt_contrato')->eliminar_todo();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_roles ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_roles($datos)
	{
		$this->dep('dr_contrato')->tabla('dt_roles')->procesar_filas($datos);
	}

	function get_roles()
	{
		$datos = $this->dep('dr_contrato')->tabla('dt_roles')->get_filas();
		return $datos;
	}

	//-----------------------------------------------------------------------------------
	//---- dt_detalles_contratos ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_detalles_contratos($datos)
	{
		$this->dep('dr_contrato')->tabla('dt_detalles_contratos')->procesar_filas($datos);
	}

	function get_detalles_contratos()
	{
		$datos = $this->dep('dr_contrato')->tabla('dt_detalles_contratos')->get_filas();
		return $datos;
	}

}
?>
