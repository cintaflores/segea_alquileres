<?php

class dao_alquileres_popup
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
                 tp.id_propiedad,
	               tp.nombre_propiedad,
	               ttp.nombre_tipo_propiedad
	                from propiedades tp
	                inner join tipos_propiedades ttp on tp.id_tipo_propiedad=ttp.id_tipo_propiedad
                  and ttp.nombre_tipo_propiedad = 'ALQUILERES'
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }

}

?>
