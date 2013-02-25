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
	    </ul>
	</div>
    </div>
    <div id="contenido">
        <div id="barra_busqueda">
        </div>
        <div id="resultado" name="resultado">
            <form id="agregar_evento" action="../../rutas.php" method="POST" >
                <fieldset>
                    <legend> +Evento</legend>
                    <div class = "compo_fielset">
                        <label>Nombre</label>
                        <input type = "text" placeholder = "Nombre" name="nombre">
                    </div>
                    <div class = "compo_fielset">
                        <label>Dia</label>
                        <input type = "text" placeholder = "Dia"  name="dia" >
                    </div>
                    <div class = "compo_fielset">
                        <label>Descripcion</label>
                        <input type = "text" placeholder = "Descripcion" name="descripcion">
                    </div>
                    <input type="hidden" name="Modelo" value="Evento/agregar_evento">
                    <input type="submit" value="Agregar" name="enviar_formulario" 
                           id="enviar_formulario">
                </fieldset>
            </form>
        </div>
    </div>
    <div id="dialogo" name="dialogo" title="Mensaje"></div>
</div>