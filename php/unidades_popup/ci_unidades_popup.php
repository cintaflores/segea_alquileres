<?php
require_once('unidades_popup/dao_unidades_popup.php');
class ci_unidades_popup extends toba_ci
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
      $datos = dao_unidades_popup::get_datos($sql_where);
      $cuadro->set_datos($datos);
    }
		//$cuadro->set_datos($this->dep('datos')->tabla('propiedades')->get_listado());
	}

	function evt__cuadro__seleccion($datos)
	{
		$this->dep('datos')->cargar($datos);
		$this->set_pantalla('pant_edicion');
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

	//---- Formulario -------------------------------------------------------------------

	function conf__formulario(toba_ei_formulario $form)
	{
		if ($this->dep('datos')->esta_cargada()) {
			$form->set_datos($this->dep('datos')->tabla('propiedades')->get());
		} else {
			$this->pantalla()->eliminar_evento('eliminar');
		}
	}

	function evt__formulario__modificacion($datos)
	{
		$this->dep('datos')->tabla('propiedades')->set($datos);
	}

	function resetear()
	{
		$this->dep('datos')->resetear();
		$this->set_pantalla('pant_seleccion');
	}

	//---- EVENTOS CI -------------------------------------------------------------------

	function evt__agregar()
	{
		$this->set_pantalla('pant_edicion');
	}

	function evt__volver()
	{
		$this->resetear();
	}

	function evt__eliminar()
	{
		$this->dep('datos')->eliminar_todo();
		$this->resetear();
	}

	function evt__guardar()
	{
		$this->dep('datos')->sincronizar();
		$this->resetear();
	}

}

?>
