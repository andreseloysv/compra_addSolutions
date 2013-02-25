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
            <div class="marco_inicio_sesion">
		<div id="label_inicio_sesion">
		    <div class="titulo_formulario">
			<label> +Usuario </label>
		    </div>
		    <form action="../../rutas.php" method="POST" id="agregar_usuario">
			<div class="campo_formulario">
			    <label>Nombre</label>
			    <div class="campo_input_inicio_sesion">
				<input type = "text" placeholder = "Nombre" name="nombre_usuario">
			    </div>
			</div>
			<div class="campo_formulario">
			    <label>Apellido</label>
			    <div class="campo_input_inicio_sesion">
				<input type = "text" placeholder = "Apellido" name="apellido">
			    </div>
			</div>
			<div class="campo_formulario">
			    <label>Correo electronico</label>
			    <div class="campo_input_inicio_sesion">
				<input type = "text" placeholder = "Correo electronico" name="correo_electronico">
			    </div>
			</div>
			<div class="campo_formulario">
			    <label>Clave</label>
			    <div class="campo_input_inicio_sesion">
				<input type = "password" placeholder = "Clave"  name="clave" >
			    </div>
			</div>
			<div class="campo_formulario">
			    <label>Repita clave</label>
			    <div class="campo_input_inicio_sesion">
				<input type = "password" placeholder = "Repita clave"  name="clave" >
			    </div>
			</div>
			<input type="hidden" name="Modelo" value="Usuario/agregar_usuario">
			<input type="submit" value="Agregar" name="agregar_usuario" id="enviar_formulario">
		    </form>
		</div>
		<div id="resultado" name="resultado"></div>
	    </div>
	</div>
    <div id="dialogo" name="dialogo" title="Mensaje"></div>
</div>