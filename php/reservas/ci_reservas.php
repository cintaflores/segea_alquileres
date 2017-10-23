<?php
require_once('reservas/dao_reservas.php');
require_once ('adebug.php');

class ci_reservas extends SeGeA_2_ci
{

  //-----------------------------------------------------------------------------------
  //---- Variables --------------------------------------------------------------------
  //-----------------------------------------------------------------------------------

  protected $s__datos;
  protected $sql_state;
  protected $s__datos_filtro;

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
    if (isset($this->s__datos_filtro)){
      $filtro = $this->dep('filtro');
      $filtro->set_datos($this->s__datos_filtro);
      $sql_where = $filtro->get_sql_where();
      $datos = dao_reservas::get_datos($sql_where);
      $cuadro->set_datos($datos);
    }
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
    //---- Filtro -----------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function conf__filtro($filtro)
    {
      if(isset($this->s__datos_filtro)){
        $filtro->set_datos($this->s__datos_filtro);
      }
    }

    function evt__filtro__filtrar($datos)
    {
      $this->s__datos_filtro = $datos;
    }

    function evt__filtro__cancelar()
    {
      unset($this->s__datos_filtro);
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
        $this->cn()->resetear();
        $this->evt__cancelar();

      } catch (toba_error_db $e) {
        if (adebug::$debug){
          throw $e;
        } else {
          $this->cn()->resetear();
          $sql_state = $e->get_sqlstate();
          if ($sql_state == 'db_23505'){
            throw new toba_error_usuario('La Reserva que intenta ingresar, ya existe');
          }
        }
        $this->cn()->resetear();
      }
    }

    function evt__cancelar()
    {
      unset($this->s__datos);
      $this->dep('ci_agregarreserva')->disparar_limpieza_memoria();
      $this->cn()->resetear();
      $this->set_pantalla('pant_inicial');
    }

}
?>
