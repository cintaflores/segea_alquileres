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
                    t_p.id_propiedad,
                    t_p.nombre_propiedad,
                    t_tc.id_tipo_contrato,
                    t_tc.nombre_tipo_contrato,
                    t_tc.cantidad
            	FROM
              	contratos as t_c
              	inner join propiedades as t_p on t_c.id_propiedad=t_p.id_propiedad
                inner join tipos_contratos as t_tc on t_c.id_tipo_contrato=t_tc.id_tipo_contrato
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

  static function get_opcionesTiposContratos()
  {
    $sql = " SELECT
                    id_tipo_contrato,
                    nombre_tipo_contrato,
                    cantidad
              FROM tipos_contratos
              ORDER BY nombre_tipo_contrato";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }

  static function get_opcionesCant_meses($id_tipo_contrato)
  {
    $id_tipo_contrato = quote($id_tipo_contrato);

    $sql = " SELECT
              cantidad
            FROM tipos_contratos
             WHERE id_tipo_contrato = $id_tipo_contrato";
    return consultar_fuente($sql)[0]['cantidad'];
    }
}
?>
