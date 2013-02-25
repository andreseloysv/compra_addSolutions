<?php

include '../ControladorAplicacion.php';

class EventoController extends ControladorAplicacion {

    function agregar_evento($campos=  array(), $modelos=  array()) {
        $this->agregar($campos,$modelos);
        Redireccion::DireccionarVista("default", "dialogo_respuesta");
    }

}

$evento = new EventoController();
if (method_exists($evento, $_SESSION['comportamiento'])) {
    $evento->$_SESSION['comportamiento']($_SESSION['campos'], $_SESSION['modelo'], $_SESSION['condiciones']);
}
?>
