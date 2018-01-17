<?php
class form extends SeGeA_2_ei_formulario
{
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

    /**
     * Javascript necesario para el caso de preguntar/responder datos
     */
    function js_caso_datos()
    {
        echo "
            Date.prototype.addDays = function(days) {
              var dat = new Date(this.valueOf());
              dat.setDate(dat.getDate() + days);
              return dat;
            }

            /**
             * Acción del botón CALCULAR
             */
            {$this->objeto_js}.calcular = function() {
                if(this.ef('fecha_inicio').tiene_estado() && this.ef('fecha_fin').tiene_estado()){
                  //--- Construyo los parametros para el calculo, en este caso son los valores del form
                  var parametros = this.controlador.dep('form').get_datos();

                  //--- Hago la peticion de datos al server, la respuesta vendra en el método this.actualizar_datos
                  this.controlador.ajax('calcular', parametros, this, this.actualizar_datos);
                  console.log(js_form_13000442_form.ef('fecha_inicio').fecha().addDays(-7));
                } else{
                  this.controlador.dep('form_calcula').ef('dias').set_estado(0);
                  this.controlador.dep('form_calcula').ef('importe').set_estado(0);
                }
            }

            /**
             * Acción cuando vuelve la respuesta desde PHP
             */
            {$this->objeto_js}.actualizar_datos = function(datos)
            {
                this.controlador.dep('form_calcula').ef('dias').set_estado(datos[0]);
                this.controlador.dep('form_calcula').ef('importe').set_estado(datos[1]);
            }
        ";
    }
	//-----------------------------------------------------------------------------------
	//---- JAVASCRIPT -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function extender_objeto_js()
	{
		$this->js_caso_datos();
		echo "
		//---- Procesamiento de EFs --------------------------------

		{$this->objeto_js}.evt__id_propiedad__procesar = function(es_inicial)
		{
		      if(this.ef('id_propiedad').tiene_estado()){
		          parametros= this.ef('id_propiedad').get_estado();
		          console.log('ajax');
		          this.controlador.ajax('getMonto', parametros, this, this.setMonto);
		    		}

		}

		    {$this->objeto_js}.setMonto = function(datos)
		{
		      console.log(datos);
		      this.ef('precio').set_estado(datos);
		}
		//---- Procesamiento de EFs --------------------------------

		{$this->objeto_js}.evt__fecha_inicio__procesar = function(es_inicial)
		{
      this.calcular();
		}

		{$this->objeto_js}.evt__fecha_fin__procesar = function(es_inicial)
		{
      this.calcular();
		}
		";
	}


}
?>
