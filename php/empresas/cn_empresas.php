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

	function set_empresas($datos)
	{
		$this->dep('dr_empresa')->tabla('dt_empresa')->set($datos);
	}

	function cargar($seleccion)
	{
		$this->dep('dr_empresa')->cargar($seleccion);
	}

	function get_empresas()
	{
		$datos = $this->dep('dr_empresa')->tabla('dt_empresa')->get();
		return $datos;
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

}
?>
