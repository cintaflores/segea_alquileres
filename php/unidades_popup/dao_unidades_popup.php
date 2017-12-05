<?php

class dao_unidades_popup
{
  static function get_datos($where='')
  {
    // ei_arbol($where);
    if($where){
      $where_armado="WHERE $where";
    } else {
      $where_armado="";
    }
      $sql = "select
	                   tp.nombre_propiedad,
	                   ttp.nombre_tipo_propiedad
	            from propiedades tp, tipos_propiedades ttp
	            where ttp.nombre_tipo_propiedad = 'UNIDADES'
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }

}

?>
