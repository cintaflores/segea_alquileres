<?php

class dao_caracteristicas_popup
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
              id_caracteristica,
              nombre_caracteristicas
            	FROM
              	caracteristicas
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }

}

?>
