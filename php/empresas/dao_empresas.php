<?php

class dao_empresas
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
              t_e.id_empresa,
              t_e.nombre,
              t_e.cuit,
              t_e.direccion,
            	t_e.logo,
              t_t.numero,
              t_ce.nombre_correo_electronico
            	FROM
              	empresas as t_e
              	inner join telefonos as t_t on t_e.id_empresa=t_t.id_empresa
                inner join correos_electronicos as t_e on t_e.id_correo_electronico=t_ce.id_correo_electronico
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }
}
?>
