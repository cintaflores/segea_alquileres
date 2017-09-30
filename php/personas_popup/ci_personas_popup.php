<?php
require_once('personas/dao_personas.php');
class ci_personas_popup extends toba_ci
{

	//---- Variables --------------------------------------------------------------------


	protected $s__datos;
	protected $sql_state;
	protected $s__datos_filtro;

	//---- Cuadro -----------------------------------------------------------------------

	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$cuadro->desactivar_modo_clave_segura();
		if (isset($this->s__datos_filtro)){
      $filtro = $this->dep('filtro');
      $filtro->set_datos($this->s__datos_filtro);
      $sql_where = $filtro->get_sql_where();
      $datos = dao_personas::get_datos($sql_where);
      $cuadro->set_datos($datos);
    }
		//$cuadro->set_datos($this->dep('datos')->tabla('personas')->get_listado());
	}

	function evt__cuadro__seleccion($datos)
	{
		$this->dep('datos')->cargar($datos);
		// $this->set_pantalla('pant_edicion');
	}


	//---- Filtro -----------------------------------------------------------------------

	function conf__filtro($filtro)
	{
		if(isset($this->s__datos_filtro)){
			$filtro->set_datos($this->s__datos_filtro);
		}
	}

	function evt__filtro__filtrar($datos)
	{
		$this->s__datos_filtro = $datos;
	}

	function evt__filtro__cancelar()
	{
		unset($this->s__datos_filtro);
	}

}

?>
