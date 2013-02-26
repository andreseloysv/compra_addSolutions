function buscar_usuario(){
    var cedula=$("#ControlAcceso_cedula").val();
    var url='../../rutas.php';
    var metodo="ControlAcceso/buscar_usuario/cedula:"+cedula;
    data="Modelo";
    
    $.post(url,{
	Modelo:metodo
    }, function(data) {
	$('#resultado').html(data);
    });
    
}

function inicio_sesion($inputs){
    var values = {};
    $inputs.each(function() {
	values[this.name] = $(this).val();
    });
    var url='../../rutas.php';
    var metodo="ControlAcceso/inicio_sesion/nombre_usuario:'"+values['nombre_usuario']+"',clave:'"+values['clave']+"'";
    data="Modelo";
    $.post(url,{
	Modelo:metodo, 
    }, function(data, textStatus, jqXHR) {
	console.debug(data);
	if(data.search("contenido_error")==-1){
	    $('#pagina').html(data);	
	}
	else{
	    $('#resultado_inicio_sesion').html(data);	    
	    window.location;
	}
    });
}