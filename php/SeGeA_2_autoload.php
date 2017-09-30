<?php
/**
 * Esta clase fue y será generada automáticamente. NO EDITAR A MANO.
 * @ignore
 */
class SeGeA_2_autoload 
{
	static function existe_clase($nombre)
	{
		return isset(self::$clases[$nombre]);
	}

	static function cargar($nombre)
	{
		if (self::existe_clase($nombre)) { 
			 require_once(dirname(__FILE__) .'/'. self::$clases[$nombre]); 
		}
	}

	static protected $clases = array(
		'SeGeA_2_comando' => 'extension_toba/SeGeA_2_comando.php',
		'SeGeA_2_modelo' => 'extension_toba/SeGeA_2_modelo.php',
		'SeGeA_2_ci' => 'extension_toba/componentes/SeGeA_2_ci.php',
		'SeGeA_2_cn' => 'extension_toba/componentes/SeGeA_2_cn.php',
		'SeGeA_2_datos_relacion' => 'extension_toba/componentes/SeGeA_2_datos_relacion.php',
		'SeGeA_2_datos_tabla' => 'extension_toba/componentes/SeGeA_2_datos_tabla.php',
		'SeGeA_2_ei_arbol' => 'extension_toba/componentes/SeGeA_2_ei_arbol.php',
		'SeGeA_2_ei_archivos' => 'extension_toba/componentes/SeGeA_2_ei_archivos.php',
		'SeGeA_2_ei_calendario' => 'extension_toba/componentes/SeGeA_2_ei_calendario.php',
		'SeGeA_2_ei_codigo' => 'extension_toba/componentes/SeGeA_2_ei_codigo.php',
		'SeGeA_2_ei_cuadro' => 'extension_toba/componentes/SeGeA_2_ei_cuadro.php',
		'SeGeA_2_ei_esquema' => 'extension_toba/componentes/SeGeA_2_ei_esquema.php',
		'SeGeA_2_ei_filtro' => 'extension_toba/componentes/SeGeA_2_ei_filtro.php',
		'SeGeA_2_ei_firma' => 'extension_toba/componentes/SeGeA_2_ei_firma.php',
		'SeGeA_2_ei_formulario' => 'extension_toba/componentes/SeGeA_2_ei_formulario.php',
		'SeGeA_2_ei_formulario_ml' => 'extension_toba/componentes/SeGeA_2_ei_formulario_ml.php',
		'SeGeA_2_ei_grafico' => 'extension_toba/componentes/SeGeA_2_ei_grafico.php',
		'SeGeA_2_ei_mapa' => 'extension_toba/componentes/SeGeA_2_ei_mapa.php',
		'SeGeA_2_servicio_web' => 'extension_toba/componentes/SeGeA_2_servicio_web.php',
	);
}
?>