<?php
require_once('propiedades/dao_propiedades.php');
require_once ('adebug.php');
require_once('oc_form_ml.php');

class ci_agregarpropiedad extends SeGeA_2_ci
{

	function obj_cache($nombre_ml)
  {
    if (!isset($this->s__datos[$nombre_ml])) {
      $this->s__datos[$nombre_ml] = new oc_form_ml();
    }
    return $this->s__datos[$nombre_ml];
  }

	//-----------------------------------------------------------------------------------
	//---- Variables --------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	protected $s__datos_filtro;
	protected $s__datos;

	//-----------------------------------------------------------------------------------
	//---- Eventos ----------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function evt__agregar()
	{
		ei_arbol(['evt__agregar']);
		$this->cn()->resetear();
		ei_arbol(['cn()->resetear()']);
		$this->set_pantalla('pant_edicion');
		ei_arbol(['set_pantalla']);
	}

	function evt__procesar()
	{
		ei_arbol(['evt__procesar']);
		try {
			$this->cn()->sincronizar();
			$this->cn()->resetear();
			$this->evt__cancelar();
		} catch (toba_error_db $e) {
			if (adebug::$debug) {
				throw $e;
			} else {
				$this->cn()->resetear();
				$sql_state = $e->get_sqlstate();
				if ($sql_state == 'db_23505') {
					throw new toba_error_usuario('La Propiedad que intenta ingresar, ya existe');
				}
			}
		}
	}

	function evt__cancelar()
	{
		ei_arbol(['evt__cancelar']);
		unset($this->s__datos);
		$this->cn()->resetear();
		$this->controlador()->set_pantalla('pant_inicial');
	}

	//-----------------------------------------------------------------------------------
	//---- Form -------------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function evt__form__modificacion($datos)
	{
		ei_arbol(['evt__form__modificacion']);
		$this->cn()->set_propiedad($datos);
	}

	function conf__form(SeGeA_2_ei_formulario $form)
	{
		ei_arbol(['conf__form']);
		$datos = $this->cn()->get_propiedad();
		$form->set_datos($datos);
	}

	//----------------------------------------------------------------------------
	//---- form_ml_fotos----------------------------------------------------------
	//----------------------------------------------------------------------------

	function conf__form_ml_fotos(SeGeA_2_ei_formulario_ml $form_ml)
	{
		$oc_ml_fotos = $this->obj_cache('form_ml_fotos_fpir'); //Aquí faltaba el manejo de oc para ml_fotos

		ei_arbol(['conf__form_ml_fotos', 'oc_ml_fotos1' => $oc_ml_fotos->get_cache()]);

		$datos = $oc_ml_fotos->get_cache();
		if (!$datos) { // Si no hay datos
			if ($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_fotos();

				ei_arbol(['datos_fotos' => $datos]);

				$datos = $this->cn()->get_blobs_fotos($datos);

				ei_arbol(['datos_fotos2' => $datos]);

				$oc_ml_fotos->set_cache($datos);

				ei_arbol(['oc_ml_fotos2' => $oc_ml_fotos->get_cache()]);
			}
		}

		$form_ml->set_datos($datos);
	}

	function quitarImagenesNulas($datos)
	{
		foreach ($datos as $key => $value) {
			if (is_null($value['imagen'])) {
				unset($datos[$key]);
			}
		}
		return $datos;
	}

	function evt__form_ml_fotos__modificacion($datos)
	{
		ei_arbol(['evt__form_ml_fotos__modificacion']);
		$cache_fotos = $this->obj_cache('form_ml_fotos_fpir');
		$datos = $this->quitarImagenesNulas($datos); //< Es necesario que no se procecen los seteos de imagen cuando son null (de todos modos no generan cambios en la base de datos), por lo tanto los quitamos del array.
		if ($datos) {
			$this->cn()->procesar_filas_fotos($datos);
			$this->cn()->set_blobs_fotos($datos);

			$datos = $this->cn()->get_fotos();
			ei_arbol(['datos_fotos1' => $datos]);

			// $datos = $this->cn()->get_blobs_fotos($datos); //< Esta implementación de get_blobs produce el error de que no se guarde la imágen en la base de datos por eso hay que quitarla o borrarla
			ei_arbol(['datos_fotos2' => $datos]);

			$this->obj_cache('form_ml_fotos_fpir')->set_cache($datos);
		}
	}


	// //-----------------------------------------------------------------------------------
	// //---- form_ml_domicilios-------------------------------------------------------------------------
	// //-----------------------------------------------------------------------------------
	// function evt__form_ml_domicilios__modificacion($datos)
	// {
	// 	$this->cn()->procesar_filas_domicilios($datos);
	// 	$this->s__datos['form_ml_domicilios'] = $datos;
	// }
	//
	// function conf__form_ml_domicilios(SeGeA_2_ei_formulario_ml $form_ml)
	// {
	// 	$datos = $this->cn()->get_domicilios();
	// 	$form_ml->set_datos($datos);
	// }

	// //-----------------------------------------------------------------------------------
	// //---- form_ml_caracteristicas-------------------------------------------------------------------------
	// //-----------------------------------------------------------------------------------
	// function evt__form_ml_caracteristicas__modificacion($datos)
	// {
	// 	$this->cn()->procesar_filas_caracteristicas($datos);
	// 	$this->s__datos['form_ml_caracteristicas'] = $datos;
	// }
	//
	// function conf__form_ml_caracteristicas(SeGeA_2_ei_formulario_ml $form_ml)
	// {
	// 	if (isset($this->s__datos['form_ml_caracteristicas'])){
	// 		$form_ml->set_datos($this->s__datos['form_ml_caracteristicas']);
	// 	} else {
	// 		if($this->cn()->hay_cursor()) {
	// 		$datos = $this->cn()->get_caracteristicas();
	// 		$this->s__datos['form_ml_caracteristicas'] = $datos;
	// 		$form_ml->set_datos($datos);
	// 		}
	// 	}
	// }

	// //-----------------------------------------------------------------------------------
	// //---- form_ml_boletas-------------------------------------------------------------------------
	// //-----------------------------------------------------------------------------------
	// function evt__form_ml_boletas__modificacion($datos)
	// {
	// 	$this->cn()->procesar_filas_boletas($datos);
	// 	$this->s__datos['form_ml_boletas'] = $datos;
	// }
	//
	// function conf__form_ml_boletas(SeGeA_2_ei_formulario_ml $form_ml)
	// {
	// 	if (isset($this->s__datos['form_ml_boletas'])){
	// 		$form_ml->set_datos($this->s__datos['form_ml_boletas']);
	// 	} else {
	// 		if($this->cn()->hay_cursor()) {
	// 		$datos = $this->cn()->get_boletas();
	// 		$this->s__datos['form_ml_boletas'] = $datos;
	// 		$form_ml->set_datos($datos);
	// 		}
	// 	}
	// }
}

?>
