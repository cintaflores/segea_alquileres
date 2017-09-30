
<?php

class dao_personas
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
              t_p.id_persona,
              t_tp.id_tipo_persona,
              t_tp.nombre_tipo_persona,
              coalesce (razon_social, t_p.apellido||', '||t_p.nombre) entidad,
              t_td.id_tipo_documento,
              t_td.nombre_tipo_documento||', '||t_p.dni documento,
            	t_p.cuit_cuil,
            	t_p.fecha_nacimiento,
              t_ti.id_tipo_iva,
            	t_ti.nombre_tipo_iva,
            	t_p.vehiculos
            	FROM
              	personas as t_p
              	inner join tipos_personas as t_tp on t_tp.id_tipo_persona=t_p.id_tipo_persona
              	inner join tipos_documentos as t_td on t_td.id_tipo_documento=t_p.id_tipo_documento
              	inner join tipos_iva as t_ti on t_ti.id_tipo_iva=t_p.id_tipo_iva
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }

  static function get_descPopUpPersona($id_persona)
  {
    $id_persona = quote($id_persona);

    $sql = " SELECT
            id_persona,
		        apellido||', '||nombre apellido_y_nombre
            FROM personas
             WHERE id_persona = $id_persona";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0) {
      return $resultado[0]['apellido_y_nombre'];
    } else {
      return 'Falló, intente nuevamente';
    }
  }

  static function get_descPopUpDomicilio($id_domicilio)
  {
    $id_domicilio = quote($id_domicilio);

    $sql = "SELECT
		          t_d.calle ||', '|| t_d.barrio ||', '|| t_l.nombre_localidad ||', '|| t_pr.nombre_provincia ||', '|| t_p.nombre_pais domicilio
              FROM domicilios t_d
              inner join paises t_p on t_d.id_pais=t_p.id_pais
              inner join provincias t_pr on t_d.id_provincia=t_pr.id_provincia
              inner join localidades t_l on t_d.id_localidad=t_l.id_localidad
             WHERE id_domicilio = $id_domicilio";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0) {
      return $resultado[0]['domicilio'];
    } else {
      return 'Falló, intente nuevamente';
    }
  }

  static function get_descPopUpPais($id_pais)
  {
    $id_pais = quote($id_pais);

    $sql = "SELECT nombre_pais
            	FROM paises
             WHERE id_pais = $id_pais";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0) {
      return $resultado[0]['nombre_pais'];
    } else {
      return 'Falló, intente nuevamente';
    }
  }

  // function get_descPopUpProvincia($id_provincia)
  // {
  //   $id_provincia = quote($id_provincia);
  //
  //   $sql = "SELECT nombre_provincia
  //           	FROM provincias
  //            WHERE id_provincia = $id_provincia";
  //
  //   $resultado = consultar_fuente($sql);
  //
  //   if (count($resultado) > 0) {
  //     return $resultado[0]['nombre_provincia'];
  //   } else {
  //     return 'Falló, intente nuevamente';
  //   }
  // }

  static function get_opcionesProvincia($id_pais)
  {
    $id_pais = quote($id_pais);

    $sql = "SELECT id_provincia,
                   nombre_provincia
            	FROM provincias
             WHERE id_pais = $id_pais";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }

  static function get_opcionesLocalidad($id_provincia)
  {
    $id_provincia = quote($id_provincia);

    $sql = "SELECT id_localidad,
                   nombre_localidad
            	FROM localidades
             WHERE id_provincia = $id_provincia";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }
}

?>
