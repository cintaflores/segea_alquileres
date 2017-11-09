------------------------------------------------------------
--[13000483]--  - dr_propiedad 
------------------------------------------------------------

------------------------------------------------------------
-- apex_objeto
------------------------------------------------------------

--- INICIO Grupo de desarrollo 13
INSERT INTO apex_objeto (proyecto, objeto, anterior, identificador, reflexivo, clase_proyecto, clase, punto_montaje, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion, posicion_botonera) VALUES (
	'SeGeA_2', --proyecto
	'13000483', --objeto
	NULL, --anterior
	NULL, --identificador
	NULL, --reflexivo
	'toba', --clase_proyecto
	'toba_datos_relacion', --clase
	'13000008', --punto_montaje
	NULL, --subclase
	NULL, --subclase_archivo
	NULL, --objeto_categoria_proyecto
	NULL, --objeto_categoria
	'- dr_propiedad', --nombre
	NULL, --titulo
	NULL, --colapsable
	NULL, --descripcion
	'SeGeA_2', --fuente_datos_proyecto
	'SeGeA_2', --fuente_datos
	NULL, --solicitud_registrar
	NULL, --solicitud_obj_obs_tipo
	NULL, --solicitud_obj_observacion
	NULL, --parametro_a
	NULL, --parametro_b
	NULL, --parametro_c
	NULL, --parametro_d
	NULL, --parametro_e
	NULL, --parametro_f
	NULL, --usuario
	'2017-10-28 15:41:09', --creacion
	NULL  --posicion_botonera
);
--- FIN Grupo de desarrollo 13

------------------------------------------------------------
-- apex_objeto_datos_rel
------------------------------------------------------------
INSERT INTO apex_objeto_datos_rel (proyecto, objeto, debug, clave, ap, punto_montaje, ap_clase, ap_archivo, sinc_susp_constraints, sinc_orden_automatico, sinc_lock_optimista) VALUES (
	'SeGeA_2', --proyecto
	'13000483', --objeto
	'0', --debug
	NULL, --clave
	'2', --ap
	'13000008', --punto_montaje
	NULL, --ap_clase
	NULL, --ap_archivo
	'0', --sinc_susp_constraints
	'1', --sinc_orden_automatico
	'1'  --sinc_lock_optimista
);

------------------------------------------------------------
-- apex_objeto_dependencias
------------------------------------------------------------

--- INICIO Grupo de desarrollo 13
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000412', --dep_id
	'13000483', --objeto_consumidor
	'13000512', --objeto_proveedor
	'dt_boletas_servicios', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	NULL  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000397', --dep_id
	'13000483', --objeto_consumidor
	'13000495', --objeto_proveedor
	'dt_caracteristicas_por_propiedad', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'2'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000388', --dep_id
	'13000483', --objeto_consumidor
	'13000486', --objeto_proveedor
	'dt_domicilio_por_propiedad', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'3'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000409', --dep_id
	'13000483', --objeto_consumidor
	'13000507', --objeto_proveedor
	'dt_fotos', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	NULL  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000386', --dep_id
	'13000483', --objeto_consumidor
	'13000351', --objeto_proveedor
	'dt_propiedad', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'1'  --orden
);
--- FIN Grupo de desarrollo 13

------------------------------------------------------------
-- apex_objeto_datos_rel_asoc
------------------------------------------------------------

--- INICIO Grupo de desarrollo 13
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000483', --objeto
	'13000021', --asoc_id
	NULL, --identificador
	'SeGeA_2', --padre_proyecto
	'13000351', --padre_objeto
	'dt_propiedad', --padre_id
	NULL, --padre_clave
	'SeGeA_2', --hijo_proyecto
	'13000486', --hijo_objeto
	'dt_domicilio_por_propiedad', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'1'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000483', --objeto
	'13000022', --asoc_id
	NULL, --identificador
	'SeGeA_2', --padre_proyecto
	'13000351', --padre_objeto
	'dt_propiedad', --padre_id
	NULL, --padre_clave
	'SeGeA_2', --hijo_proyecto
	'13000495', --hijo_objeto
	'dt_caracteristicas_por_propiedad', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'2'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000483', --objeto
	'13000026', --asoc_id
	NULL, --identificador
	'SeGeA_2', --padre_proyecto
	'13000351', --padre_objeto
	'dt_propiedad', --padre_id
	NULL, --padre_clave
	'SeGeA_2', --hijo_proyecto
	'13000507', --hijo_objeto
	'dt_fotos', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'3'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000483', --objeto
	'13000027', --asoc_id
	NULL, --identificador
	'SeGeA_2', --padre_proyecto
	'13000351', --padre_objeto
	'dt_propiedad', --padre_id
	NULL, --padre_clave
	'SeGeA_2', --hijo_proyecto
	'13000512', --hijo_objeto
	'dt_boletas_servicios', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'4'  --orden
);
--- FIN Grupo de desarrollo 13

------------------------------------------------------------
-- apex_objeto_rel_columnas_asoc
------------------------------------------------------------
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SeGeA_2', --proyecto
	'13000483', --objeto
	'13000021', --asoc_id
	'13000351', --padre_objeto
	'13000319', --padre_clave
	'13000486', --hijo_objeto
	'13000460'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SeGeA_2', --proyecto
	'13000483', --objeto
	'13000022', --asoc_id
	'13000351', --padre_objeto
	'13000319', --padre_clave
	'13000495', --hijo_objeto
	'13000465'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SeGeA_2', --proyecto
	'13000483', --objeto
	'13000026', --asoc_id
	'13000351', --padre_objeto
	'13000319', --padre_clave
	'13000507', --hijo_objeto
	'13000481'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SeGeA_2', --proyecto
	'13000483', --objeto
	'13000027', --asoc_id
	'13000351', --padre_objeto
	'13000319', --padre_clave
	'13000512', --hijo_objeto
	'13000507'  --hijo_clave
);
