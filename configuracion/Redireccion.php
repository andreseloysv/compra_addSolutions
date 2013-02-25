<?php

class Redireccion {

    var $url = 'http://127.0.0.1';

    public static function DireccionarVista($modelo, $funcion) {
        $url = "http://127.0.0.1:8080" ;
        header("Location: " . $url . "/compra/Vista/" . $modelo . "/" . $funcion . ".php");
    }

    public static function DireccionarControlador($modelo, $funcion) {
        $url = "http://127.0.0.1:8080";
        header("Location: " . $url . "/compra/Controlador/" . $modelo . "Controller.php");
    }

}

?>
