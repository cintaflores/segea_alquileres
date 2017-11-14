<?php

class dao_pagos
{
  static function get_datos($where='')
  {
    // ei_arbol($where);
    if($where){
      $where_armado="WHERE $where";
    } else {
      $where_armado="";
    }
      $sql = "SELECT
              t_cl.id_cuotas,
              t_c.id_contrato,
              t_cl.periodo,
              t_cl.fecha_vencimiento,
              t_cdc.id_concepto_de_cobro,
              t_cl.nro_cuota,
              t_cl.anio,
              t_d.id_descuento,
              t_cl.monto_descuento,
              t_cl.monto_a_pagar
            	FROM
              	cuotas as t_cl
              	inner join contratos as t_c on t_cl.id_contrato=t_c.id_contrato
                inner join conceptos_de_cobros as t_cdc on t_cl.id_concepto_de_cobro=t_cdc.id_concepto_de_cobro
                inner join descuentos as t_d on t_cl.id_descuento=t_d.id_descuento
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }
}
?>
