<?php
include '../../configuracion/Nucleo.php';
?>
<div id="pagina">
    <div id="banner">
        <a href="../../index.php" id="link_banner"><div id="banner_titulo"></div></a>
	<div name="menu" id="menu">
	    <ul id="button">
		<li><a href="../Producto/agregar.php"> +Producto</a></li>
		<li><a href="../Evento/agregar.php"> +Evento</a></li>    
		<li><a href="../Evento/agregar.php"> Iniciar Sesion</a></li>    
	    </ul>
	</div>
    </div>
    <div id="contenido">
        <div id="barra_busqueda">
            <form id="buscar_usuario" action="../../rutas.php" method="POST" >
                <label>Nombre del evento: </label>
                <input type="text" name="nombre_evento" id="nombre_evento">
                <input type="submit" value="buscar">
            </form>
        </div>
        <div id="resultado" name="resultado"></div>
    </div>
</div>