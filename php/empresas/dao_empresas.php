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
      $sql = "SELECT t_e.id_empresa,
      t_e.nombre,
       t_e.cuit,
       t_e.direccion,
       t_tt.nombre_tipo_telefono tipo_telefono,
       t_t.numero descripcion_telefono,
       t_tce.nombre_tipo_correo_electronico tipo_correo,
       t_ce.nombre_correo_electronico descripcion_correo
FROM empresas t_e
-- TELEFONOS
LEFT OUTER JOIN (
				SELECT st_e.id_empresa,
					MIN(st_t.id_telefono_empresa) id_telefono_empresa
				FROM empresas st_e
				JOIN telefonos_empresas st_t ON st_e.id_empresa = st_t.id_empresa
				GROUP BY st_e.id_empresa
		) st ON st.id_empresa = t_e.id_empresa
LEFT OUTER JOIN telefonos_empresas t_t ON t_t.id_telefono_empresa = st.id_telefono_empresa
LEFT OUTER JOIN tipos_telefonos t_tt ON t_t.id_tipo_telefono=t_tt.id_tipo_telefono
-- CORREOS
LEFT OUTER JOIN (
				SELECT st_e.id_empresa,
					MIN(st_ce.id_correo_electronico_empresa) id_correo_electronico_empresa
				FROM empresas st_e
				JOIN correos_electronicos_empresas st_ce ON st_e.id_empresa = st_ce.id_empresa
				GROUP BY st_e.id_empresa
		) sc ON sc.id_empresa = t_e.id_empresa
LEFT OUTER JOIN correos_electronicos_empresas t_ce ON t_ce.id_correo_electronico_empresa= sc.id_correo_electronico_empresa
LEFT OUTER JOIN tipos_correos_electronicos t_tce ON t_ce.id_tipo_correo_electronico=t_tce.id_tipo_correo_electronico
                $where_armado";
      $datos = consultar_fuente($sql);
      return $datos;
  }

  static function get_opcionesTiposCorreosElectronicos()
  {
    $sql = " SELECT
                    id_tipo_correo_electronico,
                    nombre_tipo_correo_electronico
              FROM tipos_correos_electronicos
              ORDER BY nombre_tipo_correo_electronico";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }

  static function get_opcionesTiposTelefonos()
  {
    $sql = " SELECT
                    id_tipo_telefono,
                    nombre_tipo_telefono
              FROM tipos_telefonos
              ORDER BY nombre_tipo_telefono";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }

  static function get_opcionesEmpresaTelefonicas()
  {
    $sql = " SELECT
                    id_empresa_telefonica,
                    nombre_empresa_telefonica
              FROM empresa_telefonicas
              ORDER BY nombre_empresa_telefonica";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }
}
?>
