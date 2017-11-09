<?php

require_once ('adebug.php');

class ci_agregarreserva extends SeGeA_2_ci
{

      protected $s__datos;
      //-----------------------------------------------------------------------------------
      //---- Form -------------------------------------------------------------------------
      //-----------------------------------------------------------------------------------

      function evt__form__modificacion($datos)
    	{
        $this->s__datos['form'] = $datos;
        $this->cn()->set_reservas($datos);
    	}

    	function conf__form(SeGeA_2_ei_formulario $form)
    	{
    		if($this->cn()->hay_cursor()) {
    			$datos = $this->cn()->get_reservas();
          $this->s__datos['form'] = $datos;
          $form->set_datos($datos);
    		}
    	}

      //-----------------------------------------------------------------------------------
  		//---- form_recomendacion-------------------------------------------------------------------------
  		//-----------------------------------------------------------------------------------
      function evt__form_recomendacion__modificacion($datos)
    	{
        $this->s__datos['form_recomendacion'] = $datos;
        $this->cn()->set_reservas($datos);
    	}

    	function conf__form_recomendacion(SeGeA_2_ei_formulario $form)
    	{
    		if($this->cn()->hay_cursor()) {
    			$datos = $this->cn()->get_reservas();
          $this->s__datos['form_recomendacion'] = $datos;
          $form->set_datos($datos);
    		}
    	}
}
?>
