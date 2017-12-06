------------------------------------------------------------
--[13000032]--  alquileres_popup 
------------------------------------------------------------

------------------------------------------------------------
-- apex_molde_operacion
------------------------------------------------------------

--- INICIO Grupo de desarrollo 13
INSERT INTO apex_molde_operacion (proyecto, molde, operacion_tipo, nombre, item, carpeta_archivos, prefijo_clases, fuente, punto_montaje) VALUES (
	'SeGeA_2', --proyecto
	'13000032', --molde
	'10', --operacion_tipo
	'alquileres_popup', --nombre
	'13000092', --item
	'alquileres_popup', --carpeta_archivos
	'_alquileres_popup', --prefijo_clases
	'SeGeA_2', --fuente
	'13000008'  --punto_montaje
);
--- FIN Grupo de desarrollo 13

------------------------------------------------------------
-- apex_molde_operacion_abms
------------------------------------------------------------
INSERT INTO apex_molde_operacion_abms (proyecto, molde, tabla, gen_usa_filtro, gen_separar_pantallas, filtro_comprobar_parametros, cuadro_eof, cuadro_eliminar_filas, cuadro_id, cuadro_forzar_filtro, cuadro_carga_origen, cuadro_carga_sql, cuadro_carga_php_include, cuadro_carga_php_clase, cuadro_carga_php_metodo, datos_tabla_validacion, apdb_pre, punto_montaje) VALUES (
	'SeGeA_2', --proyecto
	'13000032', --molde
	'propiedades', --tabla
	'0', --gen_usa_filtro
	'1', --gen_separar_pantallas
	NULL, --filtro_comprobar_parametros
	NULL, --cuadro_eof
	'0', --cuadro_eliminar_filas
	'id_propiedad', --cuadro_id
	NULL, --cuadro_forzar_filtro
	'datos_tabla', --cuadro_carga_origen
	'SELECT
	t_p.id_propiedad,
	t_p.nombre_propiedad,
	t_tp.descripcion as id_tipo_propiedad_nombre,
	t_p.id_persona
FROM
	propiedades as t_p,
	tipos_propiedades as t_tp
WHERE
		t_p.id_tipo_propiedad = t_tp.id_tipo_propiedad
ORDER BY nombre_propiedad', --cuadro_carga_sql
	NULL, --cuadro_carga_php_include
	NULL, --cuadro_carga_php_clase
	NULL, --cuadro_carga_php_metodo
	NULL, --datos_tabla_validacion
	NULL, --apdb_pre
	NULL  --punto_montaje
);

------------------------------------------------------------
-- apex_molde_operacion_abms_fila
------------------------------------------------------------

--- INICIO Grupo de desarrollo 13
INSERT INTO apex_molde_operacion_abms_fila (proyecto, molde, fila, orden, columna, asistente_tipo_dato, etiqueta, en_cuadro, en_form, en_filtro, filtro_operador, cuadro_estilo, cuadro_formato, dt_tipo_dato, dt_largo, dt_secuencia, dt_pk, elemento_formulario, ef_obligatorio, ef_desactivar_modificacion, ef_procesar_javascript, ef_carga_origen, ef_carga_sql, ef_carga_php_include, ef_carga_php_clase, ef_carga_php_metodo, ef_carga_tabla, ef_carga_col_clave, ef_carga_col_desc, punto_montaje) VALUES (
	'SeGeA_2', --proyecto
	'13000032', --molde
	'13000169', --fila
	'1', --orden
	'id_propiedad', --columna
	'1000003', --asistente_tipo_dato
	'Id Propiedad', --etiqueta
	'0', --en_cuadro
	'0', --en_form
	'0', --en_filtro
	'=', --filtro_operador
	'0', --cuadro_estilo
	'7', --cuadro_formato
	'E', --dt_tipo_dato
	NULL, --dt_largo
	'propiedades_id_propiedad_seq_3_1', --dt_secuencia
	'1', --dt_pk
	'ef_editable_numero', --elemento_formulario
	'0', --ef_obligatorio
	NULL, --ef_desactivar_modificacion
	NULL, --ef_procesar_javascript
	NULL, --ef_carga_origen
	NULL, --ef_carga_sql
	NULL, --ef_carga_php_include
	NULL, --ef_carga_php_clase
	NULL, --ef_carga_php_metodo
	NULL, --ef_carga_tabla
	NULL, --ef_carga_col_clave
	NULL, --ef_carga_col_desc
	NULL  --punto_montaje
);
INSERT INTO apex_molde_operacion_abms_fila (proyecto, molde, fila, orden, columna, asistente_tipo_dato, etiqueta, en_cuadro, en_form, en_filtro, filtro_operador, cuadro_estilo, cuadro_formato, dt_tipo_dato, dt_largo, dt_secuencia, dt_pk, elemento_formulario, ef_obligatorio, ef_desactivar_modificacion, ef_procesar_javascript, ef_carga_origen, ef_carga_sql, ef_carga_php_include, ef_carga_php_clase, ef_carga_php_metodo, ef_carga_tabla, ef_carga_col_clave, ef_carga_col_desc, punto_montaje) VALUES (
	'SeGeA_2', --proyecto
	'13000032', --molde
	'13000170', --fila
	'2', --orden
	'nombre_propiedad', --columna
	'1000001', --asistente_tipo_dato
	'Nombre Propiedad', --etiqueta
	'1', --en_cuadro
	'1', --en_form
	'0', --en_filtro
	'ILIKE', --filtro_operador
	'4', --cuadro_estilo
	'1', --cuadro_formato
	'C', --dt_tipo_dato
	NULL, --dt_largo
	'', --dt_secuencia
	'0', --dt_pk
	'ef_editable', --elemento_formulario
	'1', --ef_obligatorio
	NULL, --ef_desactivar_modificacion
	NULL, --ef_procesar_javascript
	NULL, --ef_carga_origen
	NULL, --ef_carga_sql
	NULL, --ef_carga_php_include
	NULL, --ef_carga_php_clase
	NULL, --ef_carga_php_metodo
	NULL, --ef_carga_tabla
	NULL, --ef_carga_col_clave
	NULL, --ef_carga_col_desc
	NULL  --punto_montaje
);
INSERT INTO apex_molde_operacion_abms_fila (proyecto, molde, fila, orden, columna, asistente_tipo_dato, etiqueta, en_cuadro, en_form, en_filtro, filtro_operador, cuadro_estilo, cuadro_formato, dt_tipo_dato, dt_largo, dt_secuencia, dt_pk, elemento_formulario, ef_obligatorio, ef_desactivar_modificacion, ef_procesar_javascript, ef_carga_origen, ef_carga_sql, ef_carga_php_include, ef_carga_php_clase, ef_carga_php_metodo, ef_carga_tabla, ef_carga_col_clave, ef_carga_col_desc, punto_montaje) VALUES (
	'SeGeA_2', --proyecto
	'13000032', --molde
	'13000171', --fila
	'3', --orden
	'id_tipo_propiedad', --columna
	'1000008', --asistente_tipo_dato
	'Id Tipo Propiedad', --etiqueta
	'1', --en_cuadro
	'1', --en_form
	'0', --en_filtro
	'=', --filtro_operador
	'4', --cuadro_estilo
	'1', --cuadro_formato
	'C', --dt_tipo_dato
	NULL, --dt_largo
	'', --dt_secuencia
	'0', --dt_pk
	'ef_combo', --elemento_formulario
	'1', --ef_obligatorio
	NULL, --ef_desactivar_modificacion
	NULL, --ef_procesar_javascript
	'datos_tabla', --ef_carga_origen
	'SELECT id_tipo_propiedad, descripcion FROM tipos_propiedades ORDER BY descripcion', --ef_carga_sql
	NULL, --ef_carga_php_include
	NULL, --ef_carga_php_clase
	NULL, --ef_carga_php_metodo
	'tipos_propiedades', --ef_carga_tabla
	'id_tipo_propiedad', --ef_carga_col_clave
	'descripcion', --ef_carga_col_desc
	NULL  --punto_montaje
);
INSERT INTO apex_molde_operacion_abms_fila (proyecto, molde, fila, orden, columna, asistente_tipo_dato, etiqueta, en_cuadro, en_form, en_filtro, filtro_operador, cuadro_estilo, cuadro_formato, dt_tipo_dato, dt_largo, dt_secuencia, dt_pk, elemento_formulario, ef_obligatorio, ef_desactivar_modificacion, ef_procesar_javascript, ef_carga_origen, ef_carga_sql, ef_carga_php_include, ef_carga_php_clase, ef_carga_php_metodo, ef_carga_tabla, ef_carga_col_clave, ef_carga_col_desc, punto_montaje) VALUES (
	'SeGeA_2', --proyecto
	'13000032', --molde
	'13000172', --fila
	'4', --orden
	'id_persona', --columna
	'1000003', --asistente_tipo_dato
	'Id Persona', --etiqueta
	'1', --en_cuadro
	'1', --en_form
	'0', --en_filtro
	'=', --filtro_operador
	'0', --cuadro_estilo
	'7', --cuadro_formato
	'E', --dt_tipo_dato
	NULL, --dt_largo
	'', --dt_secuencia
	'0', --dt_pk
	'ef_editable_numero', --elemento_formulario
	'0', --ef_obligatorio
	NULL, --ef_desactivar_modificacion
	NULL, --ef_procesar_javascript
	NULL, --ef_carga_origen
	NULL, --ef_carga_sql
	NULL, --ef_carga_php_include
	NULL, --ef_carga_php_clase
	NULL, --ef_carga_php_metodo
	NULL, --ef_carga_tabla
	NULL, --ef_carga_col_clave
	NULL, --ef_carga_col_desc
	NULL  --punto_montaje
);
--- FIN Grupo de desarrollo 13
