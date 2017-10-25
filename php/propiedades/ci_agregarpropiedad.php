<?php
require_once('propiedades/dao_propiedades.php');
require_once ('adebug.php');

class ci_agregarpropiedad extends SeGeA_2_ci
{

	//-----------------------------------------------------------------------------------
	//---- Variables --------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	protected $s__datos_filtro;

		//-----------------------------------------------------------------------------------
		//---- Form -------------------------------------------------------------------------
		//-----------------------------------------------------------------------------------

		function evt__form__modificacion($datos)
		{
		$this->s__datos['form'] = $datos;
		$this->cn()->set_propiedades($datos);
		// $this->cn()->set_blob_dt(null, 'dt_telefonos', $datos, 'imagen', /*es_ml?*/true);
		}

		function conf__form(SeGeA_2_ei_formulario $form)
		{
			if($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_propiedades();
			$this->s__datos['form'] = $datos;
			$form->set_datos($datos);
			} else {
				$this->pantalla()->eliminar_evento('eliminar');
			}

		}

		//-----------------------------------------------------------------------------------
		//---- form_ml_domicilios-------------------------------------------------------------------------
		//-----------------------------------------------------------------------------------
		function evt__form_ml_domicilios__modificacion($datos)
		{
		$this->s__datos['form_ml_domicilios'] = $datos;
		$this->cn()->procesar_filas_domicilios($datos);
		}

		function conf__form_ml_domicilios(SeGeA_2_ei_formulario_ml $form_ml)
		{
		if (isset($this->s__datos['form_ml_domicilios'])){
			$form_ml->set_datos($this->s__datos['form_ml_domicilios']);
		} else {
			if($this->cn()->hay_cursor()) {
			$datos = $this->cn()->get_domicilios();
			$this->s__datos['form_ml_domicilios'] = $datos;
			$form_ml->set_datos($datos);
			}
		}
		}



		//-----------------------------------------------------------------------------------
		//---- form_ml_fotos-------------------------------------------------------------------------
		//-----------------------------------------------------------------------------------

		function evt__form_ml_fotos__modificacion($datos)
	{
		$anterior = $this->s__datos['form_ml_fotos'];
		foreach ($anterior as $keya => $valuea) {
			foreach ($datos as $keyd => $valued) {
				if (isset($valuea['id_propiedad'])){
					if (isset($valued['id_propiedad'])){
						if ($valuea['id_propiedad']=$valued['id_propiedad']){
							if (isset($valuea['imagen']) && !isset($valued['imagen'])){
								$datos[$keyd]['imagen'] = $valuea['imagen'];
								$datos[$keyd]['imagen?html'] = $valuea['imagen?html'];
								$datos[$keyd]['imagen?url'] = $valuea['imagen?url'];
							}
						}
					}
				}
			}
		}
		$this->s__datos['form_ml_fotos'] = $datos;
	}

	function conf__form_ml_fotos(SeGeA_2_ei_formulario_ml $form_ml)
	{
		  if (isset($this->s__datos['form_ml_fotos'])) {
				$datos = $this->s__datos['form_ml_fotos'];
				$form_ml->set_datos($datos);
			} else if ($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_propiedades();
				$datos = $this->cn()->get_blobs($datos);
				$this->s__datos['form_ml_fotos'] = $datos;
				$form_ml->set_datos($datos);
			}
	}



}
?>
