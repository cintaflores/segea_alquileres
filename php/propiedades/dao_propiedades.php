<?php

class dao_propiedades
{
  static function get_datos($where='')
  {
    //ei_arbol($where);
    if($where){
      $where_armado="WHERE $where";
    } else {
      $where_armado="";
    }
      $sql = "SELECT
              t_pr.id_propiedad,
              t_pr.nombre_propiedad,
              --t_p.id_persona,
              -- coalesce(razon_social, apellido||', '||nombre) entidad,
              t_tpr.id_tipo_propiedad,
              t_tpr.nombre_tipo_propiedad
            	FROM
              	propiedades as t_pr
              	inner join tipos_propiedades as t_tpr on t_pr.id_tipo_propiedad=t_tpr.id_tipo_propiedad
              	--inner join personas as t_p on t_pr.id_persona=t_p.id_persona
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }

  static function get_opcionesPropiedad()
  {
    $sql = " SELECT
                    id_tipo_propiedad,
                    nombre_tipo_propiedad
              FROM tipos_propiedades
              ORDER BY nombre_tipo_propiedad";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }

  // static function get_lista_propiedades($where='')
  // {
  //   //ei_arbol($where);
  //   if($where){
  //     $where_armado="WHERE $where";
  //   } else {
  //     $where_armado="";
  //   }
  //     $sql = "SELECT
  //             t_pr.id_propiedad,
  //             t_pr.nombre_propiedad,
  //             t_p.id_persona,
  //             coalesce(razon_social, apellido||', '||nombre) entidad,
  //             t_tpr.id_tipo_propiedad,
  //             t_tpr.nombre_tipo_propiedad
  //           	FROM
  //             	propiedades as t_pr
  //             	inner join tipos_propiedades as t_tpr on t_pr.id_tipo_propiedad=t_tpr.id_tipo_propiedad
  //             	inner join personas as t_p on t_pr.id_persona=t_p.id_persona
  //               $where_armado";
  //     $datos = consultar_fuente($sql);
  //     return $datos;
  // }


  // static function get_opcionesPersona()
  // {
  //   $sql = "SELECT
  //           id_persona,
	// 	        apellido||', '||nombre apellido_y_nombre
  //           FROM personas
  //           ORDER BY apellido_y_nombre";
  //
  //   $opciones = consultar_fuente($sql);
  //   return $opciones;
  // }
  //
  // static function get_opcionesPropiedad()
  // {
  //   $sql = " SELECT
  //                   id_tipo_propiedad,
  //                   nombre_tipo_propiedad
  //             FROM tipos_propiedades
  //             ORDER BY nombre_tipo_propiedad";
  //
  //   $opciones = consultar_fuente($sql);
  //   return $opciones;
  // }

  static function get_descPopUpDomicilio($id_domicilio)
  {
    $id_domicilio = quote($id_domicilio);

    $sql = " SELECT
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
             WHERE provincias.id_pais = $id_pais";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }

  static function get_opcionesLocalidad($id_provincia)
  {
    $id_provincia = quote($id_provincia);

    $sql = "SELECT id_localidad,
                   nombre_localidad
            	FROM localidades
             WHERE localidades.id_provincia = $id_provincia";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }


}

?>
