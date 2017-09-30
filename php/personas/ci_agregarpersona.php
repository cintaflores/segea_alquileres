<?php
require_once('personas/dao_personas.php');
require_once ('adebug.php');

class ci_agregarpersona extends SeGeA_2_ci
{

  //-----------------------------------------------------------------------------------
  //---- Variables --------------------------------------------------------------------
  //-----------------------------------------------------------------------------------

  protected $s__datos;
  protected $sql_state;
  protected $s__datos_filtro;

      //-----------------------------------------------------------------------------------
      //---- Form -------------------------------------------------------------------------
      //-----------------------------------------------------------------------------------

      function evt__form__modificacion($datos)
    	{
        $this->s__datos['form'] = $datos;
        $this->cn()->set_personas($datos);
    	}

    	function conf__form(SeGeA_2_ei_formulario $form)
    	{
    		if($this->cn()->hay_cursor()) {
    			$datos = $this->cn()->get_personas();
          $this->s__datos['form'] = $datos;
          $form->set_datos($datos);
    		}
    	}

      //-----------------------------------------------------------------------------------
      //---- Form_ml-------------------------------------------------------------------------
      //-----------------------------------------------------------------------------------
      function evt__form_ml__modificacion($datos)
      {
        $this->s__datos['form_ml'] = $datos;
        $this->cn()->procesar_filas($datos);
      }

      function conf__form_ml(SeGeA_2_ei_formulario_ml $form_ml)
      {
        if (isset($this->s__datos['form_ml'])){
          $form_ml->set_datos($this->s__datos['form_ml']);
        } else {
          if($this->cn()->hay_cursor()) {
            $datos = $this->cn()->get_telefono();
            $this->s__datos['form_ml'] = $datos;
            $form_ml->set_datos($datos);
          }
        }
      }
        //-----------------------------------------------------------------------------------
        //---- Form_ml_correos_electronicos-------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------
        function evt__form_ml_correos_electronicos__modificacion($datos)
        {
          $this->s__datos['form_ml_correos_electronicos'] = $datos;
          $this->cn()->procesar_filas_correo($datos);
        }

        function conf__form_ml_correos_electronicos(SeGeA_2_ei_formulario_ml $form_ml)
        {
          if (isset($this->s__datos['form_ml_correos_electronicos'])){
            $form_ml->set_datos($this->s__datos['form_ml_correos_electronicos']);
          } else {
            if($this->cn()->hay_cursor()) {
              $datos = $this->cn()->get_correos_electronicos();
              $this->s__datos['form_ml_correos_electronicos'] = $datos;
              $form_ml->set_datos($datos);
            }
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

      function conf__form_ml_domicilios(SeGeA_2_ei_formulario_ml $form_ml_domicilios)
      {
        if (isset($this->s__datos['form_ml_domicilios'])){
          $form_ml_domicilios->set_datos($this->s__datos['form_ml_domicilios']);
        } else {
          if($this->cn()->hay_cursor()) {
            $datos = $this->cn()->get_domicilios();
            $this->s__datos['form_ml_domicilios'] = $datos;
            $form_ml_domicilios->set_datos($datos);
          }
        }
      }

      //-----------------------------------------------------------------------------------
      //---- form_ml_cuentas-------------------------------------------------------------------------
      //-----------------------------------------------------------------------------------
      function evt__form_ml_cuentas__modificacion($datos)
      {
        $this->s__datos['form_ml_cuentas'] = $datos;
        $this->cn()->procesar_filas_cuentas($datos);
      }

      function conf__form_ml_cuentas(SeGeA_2_ei_formulario_ml $form_ml_cuentas)
      {
        if (isset($this->s__datos['form_ml_cuentas'])){
          $form_ml_cuentas->set_datos($this->s__datos['form_ml_cuentas']);
        } else {
          if($this->cn()->hay_cursor()) {
            $datos = $this->cn()->get_cuentas();
            $this->s__datos['form_ml_cuentas'] = $datos;
            $form_ml_cuentas->set_datos($datos);
          }
        }
      }


}
?>
