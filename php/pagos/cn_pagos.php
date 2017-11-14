<?php
class cn_pagos extends SeGeA_2_cn
{

	//-----------------------------------------------------------------------------------
	//---- dr_cuotas ---------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_cuotas')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_cuotas')->sincronizar();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_cuotas ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function set_pagos($datos)
	{
		$this->dep('dr_cuotas')->tabla('dt_cuotas')->set($datos);
	}

	function cargar($seleccion)
	{
		$this->dep('dr_cuotas')->cargar($seleccion);
	}

	function get_pagos()
	{
		$datos = $this->dep('dr_cuotas')->tabla('dt_cuotas')->get();
		return $datos;
	}

	function hay_cursor()
	{
		if($this->dep('dr_cuotas')->tabla('dt_cuotas')->esta_cargada())
		{
			return $this->dep('dr_cuotas')->tabla('dt_cuotas')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila=$this->dep('dr_cuotas')->tabla('dt_cuotas')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_cuotas')->tabla('dt_cuotas')->set_cursor($id_fila);
	}

	function eliminar()
	{
		$this->dep('dr_cuotas')->tabla('dt_cuotas')->eliminar_todo();
	}

}
?>
