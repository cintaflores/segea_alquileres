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



	//-----------------------------------------------------------------------------------
	//---- form_ml_cuotas ---------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__form_ml_cuotas(SeGeA_2_ei_formulario_ml $form_ml)
	{
    $fec_venc = new DateTime();
    $array_cuota = [];
    $datos = $this->cn()->get_cuotas();
    $datos_form_contrato = $this->s__datos['form'];
    $cant_meses = $datos_form_contrato['cantidad'];
    $fec_inicio = strtotime(str_replace('-','/',$datos_form_contrato['fecha_inicio']));
    $mes_inicio = getdate($fec_inicio)['mon']-1;
    $anio_inicio = getdate($fec_inicio)['year'];
    $anio_venc = $anio_inicio;
    for ($i=0; $i < $cant_meses; $i++){
      $dia_venc = 10;
      $mes_inicio = ($mes_inicio + 1 == 13 ? 1 : $mes_inicio + 1);
      if ($mes_inicio +1 == 13){
        $anio_venc = $anio_venc +1;
        $fec_venc = $anio_venc. "-1-" .$dia_venc;
      } else {
        $fec_venc = $anio_venc. "-" .($mes_inicio +1). "-" .$dia_venc;
      }
      $array_cuota[] = ['nro_cuota' => $i+1
                        ,'id_periodo' => $mes_inicio
                        ,'fecha_vencimiento' => $fec_venc
                        ,'anio'=> $anio_venc
                        ,'monto_descuento'=> 0
                        ,'monto_a_pagar'=> 0];
    }
  $form_ml->set_datos_defecto($array_cuota);
	}

	function evt__form_ml_cuotas__modificacion($datos)
	{
	}

}
?>
