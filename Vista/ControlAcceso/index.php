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
		<li><a href="../ControlAcceso/index.php"> Iniciar Sesion</a></li>
	    </ul>
	</div>
    </div>
    <div id="contenido">
	<div class="marco_inicio_sesion">
	    <div id="label_inicio_sesion">
		<div class="titulo_formulario">
		    <label>Inicio Sesion: </label>
		</div>
		<form action="../../rutas.php" method="POST" id="inicio_sesion" name="inicio_sesion">
		    <input type="hidden" name="id">
		    <input type="hidden" name="Modelo" value="ControlAcceso/inicio_sesion">
		    <div class="campo_formulario">
			<label>Nombre Usuario: </label>
			<div class="campo_input_inicio_sesion">
			    <input type="text" name="nombre_usuario" id="nombre_usuario">
			</div>
		    </div>
		    <div class="campo_formulario">
			<div>
			    <label>Clave: </label>
			</div>
			<div class="campo_input_inicio_sesion">
			    <input type="password" name="clave" id="clave">
			</div>
		    </div>
		    <input type="submit" name="inicio_sesion" id="inicio_sesion" value="Inicio sesion">
		</form>
		<div id="resultado_inicio_sesion" name="resultado_inicio_sesion"></div>
	    </div>
	</div>
    </div>
    <div id="dialogo" name="dialogo" title="Mensaje"></div> <span/>
</div>