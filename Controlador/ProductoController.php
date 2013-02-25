<?php

include '../ControladorAplicacion.php';

class ProductoController extends ControladorAplicacion {

    function agregar_producto($campos=  array(), $modelos=  array()) {
        $this->agregar($campos,$modelos);
        Redireccion::DireccionarVista("default", "dialogo_respuesta");
    }

}

$producto = new ProductoController();
if (method_exists($producto, $_SESSION['comportamiento'])) {
    $producto->$_SESSION['comportamiento']($_SESSION['campos'], $_SESSION['modelo'], $_SESSION['condiciones']);
}
?>
