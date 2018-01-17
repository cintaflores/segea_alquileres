<?php

class dao_reservas
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
              t_r.id_reserva,
              t_r.fecha_reservado,
              t_pr.id_propiedad,
              t_r.precio,
              t_r.fecha_inicio,
              t_r.fecha_fin,
              t_r.fecha_confirmacion,
              t_p.id_persona
            	FROM
              	reservas as t_r
              	inner join propiedades as t_pr on t_r.id_propiedad=t_pr.id_propiedad
                inner join personas as t_p on t_r.id_persona=t_p.id_persona
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }

  static function get_fecha_actual()
  {

    $sql = " SELECT
              CURRENT_TIMESTAMP fecha_reservado";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0) {
      return $resultado[0]['fecha_reservado'];
    } else {
      return 'Fallo, intente nuevamente';
    }
  }

  static function get_descPopUpPersona($id_persona)
  {
    $id_persona = quote($id_persona);

    $sql = " SELECT
              coalesce(razon_social, apellido||', '||nombre) entidad
            FROM personas
             WHERE id_persona = $id_persona";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0) {
      return $resultado[0]['entidad'];
    } else {
      return 'Fall?, intente nuevamente';
    }
  }

  static function get_opcionesRol()
  {
    $sql = " SELECT
                    id_rol,
                    nombre_rol
              FROM rol
              ORDER BY nombre_rol";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }

  static function getMonto($id_propiedad) {
    $id_propiedad = quote($id_propiedad);

    $sql = " SELECT
              id_propiedad,
              precio
            FROM propiedades
             WHERE id_propiedad = $id_propiedad";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0) {
      return $resultado[0]['precio'];
    } else {
      return 'Fallo, intente nuevamente';
    }
  }

}
?>
