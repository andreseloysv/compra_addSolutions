<?php

include '../ControladorAplicacion.php';
include_once '../Modelo/ControlAcceso.php';

class ControlAccesoController extends ControladorAplicacion {

    function __construct() {
	
    }

    function buscar_evento($campos, $modelo, $condiciones) {
	$datos = $this->buscar($campos, "Evento", $condiciones);
	$_SESSION['respuesta'] = $datos;
	if (empty($datos['respuesta'])) {
	    $_SESSION['respuesta']['respuesta'] = array();
	    $datos = $this->buscar($campos, "Producto", $condiciones);
	    unset($_SESSION['respuesta']);
	    $_SESSION['respuesta'] = $datos;
	    if (empty($datos['respuesta'])) {
		$_SESSION['respuesta']['respuesta'] = array();
	    }
	}
	Redireccion::DireccionarVista("ControlAcceso", "buscar_evento");
    }

    function inicio_sesion($campos, $modelo, $condiciones) {
	$datos = $this->buscar($campos, "Usuario", $condiciones);
	$_SESSION['respuesta'] = $datos;
	if (empty($datos['respuesta'])) {	    
	    $_SESSION['respuesta']['respuesta'] = array();
	}
	if (($_SESSION['respuesta']['error']==NULL)) {
	    Redireccion::DireccionarVista("Usuario", "index");
	} else {
	    Redireccion::DireccionarVista("Error", "index");
	}
    }
}

$control_acceso = new ControlAccesoController();
if (method_exists($control_acceso, $_SESSION['comportamiento'])) {
    $control_acceso->$_SESSION['comportamiento']($_SESSION['campos'], $_SESSION['modelo'], $_SESSION['condiciones']);
}
?>