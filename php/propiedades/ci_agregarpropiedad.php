<?php
require_once('propiedades/dao_propiedades.php');
require_once ('adebug.php');

class ci_agregarpropiedad extends SeGeA_2_ci
{

	//-----------------------------------------------------------------------------------
	//---- Variables --------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	protected $s__datos_filtro;
	//protected $s__datos;

		//-----------------------------------------------------------------------------------
		//---- Form -------------------------------------------------------------------------
		//-----------------------------------------------------------------------------------

		function evt__form__modificacion($datos)
			{
				$this->s__datos['form'] = $datos;
			}

			function conf__form(SeGeA_2_ei_formulario $form)
			{
				$datos = $this->cn()->get_propiedad();
				$form->set_datos($datos);
			}

    //-----------------------------------------------------------------------------------
		//---- form_ml_fotos-------------------------------------------------------------------------
		//-----------------------------------------------------------------------------------

		function evt__form_ml_fotos__modificacion($datos)
			{
			//	$anterior = $this->s__datos['form_ml_fotos'];
			//	foreach ($anterior as $keya => $valuea) {
					foreach ($datos as $keyd => $valued) {
						if (isset($valuea['id_imagen'])){
							if (isset($valued['id_imagen'])){
								if ($valuea['id_imagen']=$valued['id_imagen']){
									if (isset($valuea['imagen']) && !isset($valued['imagen'])){
										$datos[$keyd]['imagen'] = $valuea['imagen'];
										$datos[$keyd]['imagen?html'] = $valuea['imagen?html'];
										$datos[$keyd]['imagen?url'] = $valuea['imagen?url'];
									}
								}
							}
						}
					}
			//	}
				$this->s__datos['form_ml_fotos'] = $datos;
			}

			function conf__form_ml_fotos(SeGeA_2_ei_formulario_ml $form_ml)
			{
				  if (isset($this->s__datos['form_ml_fotos'])) {
						$datos = $this->s__datos['form_ml_fotos'];
						$form_ml->set_datos($datos);
					} else if ($this->cn()->hay_cursor()) {
						$datos = $this->cn()->get_fotos();
						$datos = $this->cn()->get_blobs($datos);
						$this->s__datos['form_ml_fotos'] = $datos;
						$form_ml->set_datos($datos);
					}
			}

		//-----------------------------------------------------------------------------------
		//---- form_ml_domicilios-------------------------------------------------------------------------
		//-----------------------------------------------------------------------------------
		function evt__form_ml_domicilios__modificacion($datos)
		{
			$this->s__datos['form_ml_domicilios'] = $datos;
		}

		function conf__form_ml_domicilios(SeGeA_2_ei_formulario_ml $form_ml)
		{
			$datos = $this->cn()->get_domicilios();
			$form_ml->set_datos($datos);
		}

		//-----------------------------------------------------------------------------------
		//---- form_ml_caracteristicas-------------------------------------------------------------------------
		//-----------------------------------------------------------------------------------
		function evt__form_ml_caracteristicas__modificacion($datos)
		{
		$this->s__datos['form_ml_caracteristicas'] = $datos;
	//	$this->cn()->procesar_filas_caracteristicas($datos);
		}

		function conf__form_ml_caracteristicas(SeGeA_2_ei_formulario_ml $form_ml)
		{
		if (isset($this->s__datos['form_ml_caracteristicas'])){
			$form_ml->set_datos($this->s__datos['form_ml_caracteristicas']);
		} else {
			if($this->cn()->hay_cursor()) {
			$datos = $this->cn()->get_caracteristicas();
			$this->s__datos['form_ml_caracteristicas'] = $datos;
			$form_ml->set_datos($datos);
			}
		}
		}


			//-----------------------------------------------------------------------------------
			//---- form_ml_boletas-------------------------------------------------------------------------
			//-----------------------------------------------------------------------------------
			function evt__form_ml_boletas__modificacion($datos)
			{
			$this->s__datos['form_ml_boletas'] = $datos;
			//	$this->cn()->procesar_filas_boletas($datos);
			}

			function conf__form_ml_boletas(SeGeA_2_ei_formulario_ml $form_ml)
			{
			if (isset($this->s__datos['form_ml_boletas'])){
				$form_ml->set_datos($this->s__datos['form_ml_boletas']);
			} else {
				if($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_boletas();
				$this->s__datos['form_ml_boletas'] = $datos;
				$form_ml->set_datos($datos);
				}
			}
			}

		  function setear_todos_los_formularios()
		  	{
		    	if (isset($this->s__datos['form'])) {
		      	$this->cn()->set_propiedad($this->s__datos['form']);
		    	}
		    	if (isset ($this->s__datos['form_ml_fotos'])){
		      	$this->cn()->procesar_filas_fotos($this->s__datos['form_ml_fotos']);
						$this->cn()->set_blobs($this->s__datos['form_ml_fotos']);
		      }
					if (isset ($this->s__datos['form_ml_domicilios'])){
		      	$this->cn()->procesar_filas_domicilios($this->s__datos['form_ml_domicilios']);
		    	}
					if (isset ($this->s__datos['form_ml_caracteristicas'])){
		      	$this->cn()->procesar_filas_caracteristicas($this->s__datos['form_ml_caracteristicas']);
		    	}
					if (isset ($this->s__datos['form_ml_boletas'])){
		      	$this->cn()->procesar_filas_boletas($this->s__datos['form_ml_boletas']);
		    	}
		    }
}

?>
