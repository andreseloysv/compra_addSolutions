function agregar_usuario($inputs){    
    var values = {};
    $inputs.each(function() {
	values[this.name] = $(this).val();
    });
    var url='../../rutas.php';
    var metodo="Usuario/agregar_usuario/";
    data="Modelo";
    $.post(url,{
	Modelo:metodo, 
	campos:values
    }, function(data) {
	$('#dialogo').html(data);	
	carga_dialogo();
    });
}