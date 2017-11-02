<?php
require_once('empresas/dao_empresas.php');
require_once ('adebug.php');

class ci_empresas extends SeGeA_2_ci
{
  //-----------------------------------------------------------------------------------
  //---- Configuraciones --------------------------------------------------------------
  //-----------------------------------------------------------------------------------

  function conf__pant_edicion(toba_ei_pantalla $pantalla)
  {
    if(! $this->cn()->hay_cursor()) {
      $this->pantalla()->eliminar_evento('eliminar');
    }
  }

  //-----------------------------------------------------------------------------------
  //---- Cuadro -----------------------------------------------------------------------
  //-----------------------------------------------------------------------------------
  function conf__cuadro($cuadro) {
      $datos = dao_empresas::get_datos();
      $cuadro->set_datos($datos);
  }
    function evt__cuadro__seleccion($seleccion)
    {
      $this->cn()->cargar($seleccion);
      $this->cn()->set_cursor($seleccion);
      $this->set_pantalla('pant_edicion');
    }

    function evt__cuadro__eliminar($seleccion)
    {
      $this->cn()->resetear();
      $this->cn()->cargar($seleccion);
      $this->cn()->eliminar();
      $this->cn()->resetear();
    }


    //-----------------------------------------------------------------------------------
    //---- Eventos ----------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function evt__agregar()
    {
      $this->cn()->resetear();
      $this->set_pantalla('pant_edicion');
    }


    	function evt__procesar()
    	{
    		try {
    			$this->cn()->sincronizar();
    			$this->evt__cancelar();

    		} catch (toba_error_db $e) {
    			if (adebug::$debug){
    				throw $e;
    			} else {
    				$this->cn()->resetear();
    				$sql_state = $e->get_sqlstate();
    				if ($sql_state == 'db_23505'){
    					throw new toba_error_usuario('La Empresa que intenta ingresar, ya existe');
    				}
    			}
    			$this->cn()->resetear();
    		}
    	}

      function evt__cancelar()
    	{
        unset($this->s__datos);
        $this->cn()->resetear();
        $this->set_pantalla('pant_inicial');
    	}

      //-----------------------------------------------------------------------------------
      //---- Form -------------------------------------------------------------------------
      //-----------------------------------------------------------------------------------

      function evt__form__modificacion($datos)
      {
        $this->s__datos['form'] = $datos;
        $this->cn()->set_empresas($datos);
      }

      function conf__form(SeGeA_2_ei_formulario $form)
      {
        if($this->cn()->hay_cursor()) {
          $datos = $this->cn()->get_empresas();
          $this->s__datos['form'] = $datos;
          $form->set_datos($datos);
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
    //---- Form_ml_telefonos-------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------
    function evt__form_ml_telefonos__modificacion($datos)
    {
      $this->s__datos['Form_ml_telefonos'] = $datos;
      $this->cn()->procesar_filas($datos);
    }

    function conf__form_ml_telefonos(SeGeA_2_ei_formulario_ml $form_ml)
    {
      if (isset($this->s__datos['Form_ml_telefonos'])){
        $form_ml->set_datos($this->s__datos['Form_ml_telefonos']);
      } else {
        if($this->cn()->hay_cursor()) {
          $datos = $this->cn()->get_telefono();
          $this->s__datos['Form_ml_telefonos'] = $datos;
          $form_ml->set_datos($datos);
        }
      }
    }


}
?>
