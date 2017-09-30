<?php

class dao_domicilios_popup
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
              t_d.id_domicilio,
              t_d.calle,
              t_d.numero,
            	t_d.barrio,
            	t_d.piso,
              t_d.edificio,
              t_d.departamento,
            	t_l.id_localidad,
              t_l.nombre_localidad,
            	t_pr.id_provincia,
              t_pr.nombre_provincia,
            	t_p.id_pais,
              t_p.nombre_pais
            	FROM
              	domicilios as t_d
                inner join localidades as t_l on t_d.id_localidad=t_l.id_localidad
                inner join provincias as t_pr on t_pr.id_provincia=t_l.id_provincia
              	inner join paises as t_p on t_p.id_pais=t_pr.id_pais
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }

}

?>
