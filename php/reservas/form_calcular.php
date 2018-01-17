<?php

class form extends SeGeA_2_ei_formulario
{
    protected $s__cache_feriados = array();

    function extender_objeto_js()
    {
        $this->js_caso_datos();
        $this->js_caso_validacion();
    }


    function conf__form_datos_param(SeGeA_2_ei_formulario $form)
    {
        $inicio = new toba_fecha();
        $fin = new toba_fecha();
        $fin->set_timestamp($inicio->get_fecha_desplazada_meses(1));
        $datos = array(
                'valor_diario' => '15.25',
                'fecha_inicio' =>  $inicio->get_fecha_db(),
                'fecha_fin' => $fin->get_fecha_db()
        );
        $form->set_datos($datos);
    }

    /**
     * Metodo invocado desde JS para 'calcular' el nuevo importe
     */
    function ajax__calcular($parametros, toba_ajax_respuesta $respuesta)
    {
        //--- Calculo el valor total en base a las fechas y el valor diario
        $fecha1 = toba_fecha::desde_pantalla($parametros['fecha_inicio']);
        $fecha2 = toba_fecha::desde_pantalla($parametros['fecha_fin']);
        $cant_dias = $fecha1->diferencia_dias($fecha2);
        $total = $cant_dias * $parametros['valor_diario'];

        //-- Paso la información a JS
        $respuesta->set(array($cant_dias, $total));
    }

    /**
     * Javascript necesario para el caso de preguntar/responder datos
     */
    function js_caso_datos()
    {
        echo "
            /**
             * Acción del botón CALCULAR
             */
            {$this->objeto_js}.evt__form_datos_resp__calcular = function() {
                //--- Construyo los parametros para el calculo, en este caso son los valores del form
                var parametros = this.dep('form_datos_param').get_datos();

                //--- Hago la peticion de datos al server, la respuesta vendra en el método this.actualizar_datos
                this.ajax('calcular', parametros, this, this.actualizar_datos);

                //--- Evito que el mecanismo 'normal' de comunicacion cliente-servidor se ejecute
                return false;
            }

            /**
             * Acción cuando vuelve la respuesta desde PHP
             */
            {$this->objeto_js}.actualizar_datos = function(datos)
            {
                this.dep('form_datos_resp').ef('dias').set_estado(datos[0]);
                this.dep('form_datos_resp').ef('importe').set_estado(datos[1]);
            }
        ";
    }


    /******************************************************************************
     *** CASO 2: Comunicación de datos via AJAX utilizado en una validación en JS
     *******************************************************************************/

    /**
     * Método invocado desde JS para validar un día especifico contra un WebService de feriados
     * del Ministerio del Interior (http://www.mininterior.gov.ar/servicios/wsferiados.asp)
     */
    function ajax__validar_dia_habil($dia, toba_ajax_respuesta $respuesta)
    {
        $mensaje = '';
        $es_valido = $this->validar_dia($dia, $mensaje);
        $respuesta->set(array('es_valido' => $es_valido, 'mensaje' => $mensaje));
    }

    function ajax__validar_lista_dias($fechas, toba_ajax_respuesta $respuesta)
    {
        $salida = array();
        foreach ($fechas as $fecha) {
            $mensaje = '';
            if (! $this->validar_dia($fecha, $mensaje)) {
                $salida[] = $mensaje;
            }
        }
        $respuesta->set($salida);
    }

    /**
     * Función de ayuda que comprueba si un dia es feriado
     */
    function validar_dia($dia, & $mensaje)
    {
        if (trim($dia) == '') {
            return true;
        }
        $es_valido = true;
        $fecha = toba_fecha::desde_pantalla($dia);
        $anio = $fecha->get_parte('año');
        //--- Se forma un cache de feriados por año para evitar ir al WS en cada pedido, esto es un ejemplo de juguete!
        if (! isset($this->s__cache_feriados[$anio])) {
            $client = new SoapClient('http://webservices.mininterior.gov.ar/Feriados/Service.svc?wsdl');
            $d1 = mktime(0, 0, 0, 1, 1, $anio);
            $d2 = mktime(0, 0, 0, 12, 31, $anio);
            $feriados = $client->FeriadosEntreFechasAsXml(array('d1'=>$d1, 'd2'=>$d2));
            $this->s__cache_feriados[$anio] = $feriados->FeriadosEntreFechasAsXmlResult;
        }
        $feriados = simplexml_load_string($this->s__cache_feriados[$anio]);
        foreach ($feriados as $feriado) {
            $fecha_feriado = new toba_fecha((string) $feriado->FechaEfectiva);
            if ($fecha_feriado->es_igual_que($fecha)) {
                $es_valido = false;
                $mensaje = 'El '.$fecha->get_fecha_pantalla().'
                                 es '. trim((string) utf8_decode($feriado->Descripcion)).
                                ' por '.trim((string) utf8_decode($feriado->TipoDescripcion));
                break;
            }
        }
        return $es_valido;
    }

    /**
     * Javascript necesario para el caso de preguntar/responder datos
     */
    function js_caso_validacion()
    {
        echo "
            var confirmado = false;
            {$this->objeto_js}.evt__confirmar = function() {
                if (confirmado) {
                    return true;
                }
                var datos = this.dep('form_validacion').get_datos();
                var parametros = [];
                for (i in datos) {
                    parametros.push(datos[i]['dia']);
                }
                this.ajax('validar_lista_dias', parametros, this, this.respuesta_confirmacion);
                return false;
            }

            /**
             * Acción cuando vuelve la respuesta desde PHP
             */
            {$this->objeto_js}.respuesta_confirmacion = function(errores)
            {
                if (errores.length > 0) {
                    var error = 'Errores: <ul>';
                    for (i in errores) {
                        error = error + '<li>' + errores[i] + '</li>';
                    }
                    error = error + '</ul>';
                    notificacion.limpiar();
                    notificacion.agregar(error);
                    notificacion.mostrar();
                } else {
                    confirmado = true;
                    {$this->objeto_js}.set_evento(new evento_ei('confirmar', true, '' ));
                }
            }
        ";
    }


    function evt__confirmar()
    {
        toba::notificacion()->agregar('Confirmado OK!', 'info');
    }


}

?>
