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
    		} else {
          $datos['fecha_reservado']= dao_reservas::get_fecha_actual();
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

      function ajax__getMonto ($id, $respuesta){

      //$respuesta->set($id);
       $respuesta->set(dao_reservas::getMonto($id));
      }
      /**
       * Metodo invocado desde JS para 'calcular' el nuevo importe
       */
      function ajax__calcular($parametros, toba_ajax_respuesta $respuesta)
      {
          //--- Calculo el valor total en base a las fechas y el valor diario
          $fecha1 = toba_fecha::desde_pantalla($parametros['fecha_inicio']);
          $fecha2 = toba_fecha::desde_pantalla($parametros['fecha_fin']);
          $dias = $fecha1->diferencia_dias($fecha2);
          $importe = $dias * $parametros['precio'];

          //-- Paso la información a JS
          $respuesta->set(array($dias, $importe));
      }
}
?>
