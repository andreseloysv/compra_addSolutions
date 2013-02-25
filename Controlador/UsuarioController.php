<?php

include '../ControladorAplicacion.php';

class UsuarioController extends ControladorAplicacion {

    function agregar_usuario($campos=  array(), $modelos=  array()) {
        $this->agregar($campos,$modelos);
        Redireccion::DireccionarVista("default", "dialogo_respuesta");
    }

}

$usuario = new UsuarioController();
if (method_exists($usuario, $_SESSION['comportamiento'])) {
    $usuario->$_SESSION['comportamiento']($_SESSION['campos'], $_SESSION['modelo'], $_SESSION['condiciones']);
}
?>
