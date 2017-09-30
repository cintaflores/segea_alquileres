<?php

require_once ('adebug.php');

class ci_agregarcontrato extends SeGeA_2_ci
{

      protected $s__datos;
      //-----------------------------------------------------------------------------------
      //---- Form -------------------------------------------------------------------------
      //-----------------------------------------------------------------------------------

      function evt__form__modificacion($datos)
    	{
        $this->s__datos['form'] = $datos;
        $this->cn()->set_contratos($datos);
    	}

    	function conf__form(SeGeA_2_ei_formulario $form)
    	{
    		if($this->cn()->hay_cursor()) {
    			$datos = $this->cn()->get_contratos();
          $this->s__datos['form'] = $datos;
          $form->set_datos($datos);
    		}
    	}

      //-----------------------------------------------------------------------------------
  		//---- form_ml_roles-------------------------------------------------------------------------
  		//-----------------------------------------------------------------------------------
  		function evt__form_ml_roles__modificacion($datos)
  		{
  		    $this->s__datos['form_ml_roles'] = $datos;
  		    $this->cn()->procesar_filas_roles($datos);
  		}

  		function conf__form_ml_roles(SeGeA_2_ei_formulario_ml $form_ml)
  		{
  			$datos = $this->cn()->get_roles();
  			$form_ml->set_datos($datos);
  		}

      //-----------------------------------------------------------------------------------
  		//---- form_ml_detalles_contratos-------------------------------------------------------------------------
  		//-----------------------------------------------------------------------------------
  		function evt__form_ml_detalle_contrato__modificacion($datos)
  		{
  		$this->s__datos['form_ml_detalles_contratos'] = $datos;
  		$this->cn()->procesar_filas_detalles_contratos($datos);
  		}

  		function conf__form_ml_detalles_contratos(SeGeA_2_ei_formulario_ml $form_ml)
  		{
  		if (isset($this->s__datos['form_ml_detalles_contratos'])){
  			$form_ml->set_datos($this->s__datos['form_ml_detalles_contratos']);
  		} else {
  			if($this->cn()->hay_cursor()) {
  			$datos = $this->cn()->get_detalles_contratos();
  			$this->s__datos['form_ml_detalles_contratos'] = $datos;
  			$form_ml->set_datos($datos);
  			}
  		}


  		}



}
?>
