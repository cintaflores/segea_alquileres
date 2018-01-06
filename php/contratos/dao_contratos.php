<?php

class dao_contratos
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
              t_c.id_contrato,
              t_c.fecha_inicio,
              t_c.fecha_fin,
              t_c.cantidad,
            	t_p.id_propiedad
            	FROM
              	contratos as t_c
              	inner join propiedades as t_p on t_c.id_propiedad=t_p.id_propiedad
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }

  static function get_descPopUpPropiedad($id_propiedad)
  {
    $id_propiedad = quote($id_propiedad);

    $sql = " SELECT
               tp.id_propiedad,
               tp.nombre_propiedad nombre_propiedad,
               ttp.nombre_tipo_propiedad
                from propiedades tp, tipos_propiedades ttp
                where tp.id_tipo_propiedad=ttp.id_tipo_propiedad
                and ttp.nombre_tipo_propiedad = 'ALQUILERES'
             and id_propiedad = $id_propiedad";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0) {
      return $resultado[0]['nombre_propiedad'];
    } else {
      return 'Falló, intente nuevamente';
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
      return 'Falló, intente nuevamente';
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

  static function get_opcionesPeriodos()
  {
    $sql = " SELECT
                    id_periodo,
                    nombre_periodo
              FROM periodos
              ORDER BY nombre_periodo";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }

}
?>
