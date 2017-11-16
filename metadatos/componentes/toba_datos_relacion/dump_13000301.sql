------------------------------------------------------------
--[13000301]--  - dr_persona 
------------------------------------------------------------

------------------------------------------------------------
-- apex_objeto
------------------------------------------------------------

--- INICIO Grupo de desarrollo 13
INSERT INTO apex_objeto (proyecto, objeto, anterior, identificador, reflexivo, clase_proyecto, clase, punto_montaje, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion, posicion_botonera) VALUES (
	'SeGeA_2', --proyecto
	'13000301', --objeto
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
	'- dr_persona', --nombre
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
	'2017-05-12 20:55:47', --creacion
	NULL  --posicion_botonera
);
--- FIN Grupo de desarrollo 13

------------------------------------------------------------
-- apex_objeto_datos_rel
------------------------------------------------------------
INSERT INTO apex_objeto_datos_rel (proyecto, objeto, debug, clave, ap, punto_montaje, ap_clase, ap_archivo, sinc_susp_constraints, sinc_orden_automatico, sinc_lock_optimista) VALUES (
	'SeGeA_2', --proyecto
	'13000301', --objeto
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
	'13000433', --dep_id
	'13000301', --objeto_consumidor
	'13000533', --objeto_proveedor
	'dt_correos_electronicos', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'5'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000292', --dep_id
	'13000301', --objeto_consumidor
	'13000390', --objeto_proveedor
	'dt_cuentas', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'1'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000261', --dep_id
	'13000301', --objeto_consumidor
	'13000360', --objeto_proveedor
	'dt_domicilio_por_persona', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'2'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000219', --dep_id
	'13000301', --objeto_consumidor
	'13000302', --objeto_proveedor
	'dt_persona', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'3'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000227', --dep_id
	'13000301', --objeto_consumidor
	'13000317', --objeto_proveedor
	'dt_telefono', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'4'  --orden
);
--- FIN Grupo de desarrollo 13

------------------------------------------------------------
-- apex_objeto_datos_rel_asoc
------------------------------------------------------------

--- INICIO Grupo de desarrollo 13
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000301', --objeto
	'13000001', --asoc_id
	NULL, --identificador
	'SeGeA_2', --padre_proyecto
	'13000302', --padre_objeto
	'dt_persona', --padre_id
	NULL, --padre_clave
	'SeGeA_2', --hijo_proyecto
	'13000317', --hijo_objeto
	'dt_telefono', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'1'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000301', --objeto
	'13000008', --asoc_id
	NULL, --identificador
	'SeGeA_2', --padre_proyecto
	'13000302', --padre_objeto
	'dt_persona', --padre_id
	NULL, --padre_clave
	'SeGeA_2', --hijo_proyecto
	'13000360', --hijo_objeto
	'dt_domicilio_por_persona', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'2'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000301', --objeto
	'13000012', --asoc_id
	NULL, --identificador
	'SeGeA_2', --padre_proyecto
	'13000302', --padre_objeto
	'dt_persona', --padre_id
	NULL, --padre_clave
	'SeGeA_2', --hijo_proyecto
	'13000390', --hijo_objeto
	'dt_cuentas', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'3'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SeGeA_2', --proyecto
	'13000301', --objeto
	'13000038', --asoc_id
	NULL, --identificador
	'SeGeA_2', --padre_proyecto
	'13000302', --padre_objeto
	'dt_persona', --padre_id
	NULL, --padre_clave
	'SeGeA_2', --hijo_proyecto
	'13000533', --hijo_objeto
	'dt_correos_electronicos', --hijo_id
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
	'13000301', --objeto
	'13000001', --asoc_id
	'13000302', --padre_objeto
	'13000373', --padre_clave
	'13000317', --hijo_objeto
	'13000276'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SeGeA_2', --proyecto
	'13000301', --objeto
	'13000008', --asoc_id
	'13000302', --padre_objeto
	'13000373', --padre_clave
	'13000360', --hijo_objeto
	'13000331'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SeGeA_2', --proyecto
	'13000301', --objeto
	'13000012', --asoc_id
	'13000302', --padre_objeto
	'13000373', --padre_clave
	'13000390', --hijo_objeto
	'13000370'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SeGeA_2', --proyecto
	'13000301', --objeto
	'13000038', --asoc_id
	'13000302', --padre_objeto
	'13000373', --padre_clave
	'13000533', --hijo_objeto
	'13000567'  --hijo_clave
);
