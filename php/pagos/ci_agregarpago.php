<?php

require_once ('adebug.php');

class ci_agregarpago extends SeGeA_2_ci
{

      protected $s__datos;
      //-----------------------------------------------------------------------------------
      //---- Form -------------------------------------------------------------------------
      //-----------------------------------------------------------------------------------

      function evt__form__modificacion($datos)
    	{
        $this->s__datos['form'] = $datos;
        $this->cn()->set_pagos($datos);
    	}

    	function conf__form(SeGeA_2_ei_formulario $form)
    	{
    		if($this->cn()->hay_cursor()) {
    			$datos = $this->cn()->get_pagos();
          $this->s__datos['form'] = $datos;
          $form->set_datos($datos);
    		}
    	}
}
?>
