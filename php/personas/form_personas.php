<?php
class form_personas extends SeGeA_2_ei_formulario
{


  //-----------------------------------------------------------------------------------
//---- JAVASCRIPT -------------------------------------------------------------------
//-----------------------------------------------------------------------------------

function extender_objeto_js()
{
  echo "
{$this->objeto_js}.evt__id_tipo_persona__procesar = function(es_inicial)
{
  var nodo = this.ef('id_tipo_persona').input();

var indice = nodo.selectedIndex;
var valor='';

if (indice) {
valor = nodo.options[indice].text;
}
  var resultado = valor.substring(0,3);
  if (resultado.toUpperCase()=='FIS') {
                      this.ef('nombre').mostrar();
                      this.ef('apellido').mostrar();
                      this.ef('id_tipo_documento').mostrar();
                      this.ef('dni').mostrar();
                      this.ef('razon_social').ocultar();
                      this.ef('cuit_cuil').mostrar();
                      this.ef('ing_bruto').ocultar();
                      this.ef('fecha_nacimiento').mostrar();
                      this.ef('fecha_ini_act').ocultar();
                      this.ef('id_tipo_iva').mostrar();
                      this.ef('vehiculos').mostrar();
      } else {
        this.ef('nombre').ocultar();
        this.ef('apellido').ocultar();
        this.ef('id_tipo_documento').ocultar();
        this.ef('dni').ocultar();
        this.ef('razon_social').mostrar();
        this.ef('cuit_cuil').mostrar();
        this.ef('ing_bruto').mostrar();
        this.ef('fecha_nacimiento').ocultar();
        this.ef('fecha_ini_act').mostrar();
        this.ef('id_tipo_iva').mostrar();
        this.ef('vehiculos').mostrar();
      }
  }



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
