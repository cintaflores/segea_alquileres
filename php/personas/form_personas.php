<?php
class form_personas extends SeGeA_2_ei_formulario
{


  //-----------------------------------------------------------------------------------
//---- JAVASCRIPT -------------------------------------------------------------------
//-----------------------------------------------------------------------------------

function extender_objeto_js()
{
  echo "

  //---- Procesamiento de EFs --------------------------------

  {$this->objeto_js}.evt__nombre__procesar = function(es_inicial)
  {
    var ef=this.ef('nombre');

    if(ef.tiene_estado){
      ef.set_estado(ef.get_estado().toUpperCase());
    }

  }

  //---- Procesamiento de EFs --------------------------------

  {$this->objeto_js}.evt__apellido__procesar = function(es_inicial)
  {
    var ef=this.ef('apellido');

    if(ef.tiene_estado){
      ef.set_estado(ef.get_estado().toUpperCase());
    }

  }

  //---- Procesamiento de EFs --------------------------------

  {$this->objeto_js}.evt__razon_social__procesar = function(es_inicial)
  {
    var ef=this.ef('razon_social');

    if(ef.tiene_estado){
      ef.set_estado(ef.get_estado().toUpperCase());
    }

  }
  ";
}


}

?>
