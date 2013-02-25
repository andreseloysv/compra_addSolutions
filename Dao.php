<?php

include 'configuracion/Redireccion.php';
include 'configuracion/ConsultaPostgreSql.php';

class Dao {

    var $respuesta;
    var $conexion_base_datos;

    function get_nombre_modelo($nombre_controlador) {
	$arreglo_nombre_controlador=$explode("Controller", $nombre_controlador);
        return $arreglo_nombre_controlador[0];
    }

    function carga_modelo($modelo) {
        $this->respuesta = array();
        try {
            if (!@include_once 'Modelo/' . $modelo . '.php') {
                throw new Exception('No se encuentra el archivo' . $modelo . '.php <br> En la carpeta Modelo');
            }
            $this->conexion_base_datos = new ConsultaPostgreSql();
            return $modelo;
        } catch (Exception $e) {
            $_SESSION['respuesta']['error'] = $this->respuesta['error'] = "No se encuentra el archivo " . $modelo . '.php <br> En la carpeta Modelo';
            $error = new Error();
            Redireccion::Direccionar($error, "index");
        }
    }

}

?>