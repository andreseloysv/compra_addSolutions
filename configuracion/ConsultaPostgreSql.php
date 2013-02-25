<?php

include 'BaseDatos.php';

class ConsultaPostgreSql {

    var $conexion;
    var $BaseDatos;
    var $respuesta;

    public function __construct() {
	$this->BaseDatos = new BaseDatos();
    }

    function conectar() {
	$this->conexion = pg_connect("host=".$this->BaseDatos->servidor." port=".$this->BaseDatos->puerto." dbname=".$this->BaseDatos->nombre_base_datos." user=".$this->BaseDatos->nombre_usuario." password=".$this->BaseDatos->clave);
	if (!$this->conexion) {
	    die('No se puede conectar: ' . pg_last_error());
	}
    }

    function limpia_cadena($cadena) {
	str_replace("-", " ", $cadena);
	return $cadena;
    }

    function valida_columnas($tabla, $columnas = array()) {
	$columnas_validas = array();
	$this->conectar();
	$query = "SELECT * FROM " . $this->limpia_cadena($tabla);
	$result = pg_query($this->conexion,$query);
	$numero_resultados = pg_num_fields($result);
	$interador = 0;
	while ($numero_resultados > $interador) {
	    $columnas_validas[] = pg_field_name($result, $interador);
	    $interador++;
	}

	if (count(array_intersect(array_keys($columnas), $columnas_validas)) == count($columnas))
	    return TRUE;
	else
	    return FALSE;
    }

    function insertar($campos = array(), $tablas = array(), $columnas = array()) {
	$this->conectar();
	$this->respuesta = array();
	$this->respuesta['error'] = '';
	$this->respuesta['consulta_sql'] = '';
	$this->respuesta['respuesta'] = array();

	$query = "INSERT INTO ";
	foreach ($tablas as $key => $value) {
	    $query .= $this->limpia_cadena($value) . " ";
	}
//	exit(var_dump($this->valida_columnas($tablas[0], $campos)));
	if ((!empty($campos)) && ($this->valida_columnas($tablas[0], $campos))) {
	    $query .=" ( ";
	    $contador = 1;
	    $cantidad_campos = count($campos);
	    foreach ($campos as $key => $value) {
		if ($cantidad_campos > $contador) {
		    $query .= $this->limpia_cadena($key) . ", ";
		} else {
		    $query .= $this->limpia_cadena($key);
		}
		$contador++;
	    }
	    $query .=" ) ";


	    $query .="VALUES (";
	    $contador = 1;
	    foreach ($campos as $key => $value) {
		if ($cantidad_campos > $contador) {
		    $query .= "'" . $this->limpia_cadena($value) . "', ";
		} else {
		    $query .= "'" . $this->limpia_cadena($value) . "'";
		}
		$contador++;
	    }
	    $query .=" ) ";
	} else {
	    return $this->respuesta['error'][] = "No hay camos o valores.";
	}
	$this->respuesta['consulta_sql'] = $query;
	$result = pg_query($this->conexion,$query);

	if ($result === TRUE) {
	    return $this->respuesta['DDL'] = 'Operacion realizada con exito.';
	} elseif ($result === FALSE) {
	    if (pg_last_error() === 1062) {
		return $this->respuesta['error'][] ="El usuario ya esta registrado.";
	    }
	    else
		return $this->respuesta['error'][] ="No se encotraron datos.";
	}
	return $this->respuesta['respuesta'][] = "Se guardo con exito.";
    }

    function consulta($campos = array(), $tablas = array(), $condiciones = array()) {
	$this->conectar();
	$this->respuesta = array();
	$this->respuesta['error'] = array();
	$this->respuesta['consulta_sql'] = '';
	$this->respuesta['respuesta'] = array();

	$query = "SELECT ";
	if (empty($campos)) {
	    $query .=" * ";
	} else {
	    foreach ($campos as $key => $value) {
		$query .= $this->limpia_cadena($value) . " ";
	    }
	}
	$query .="FROM ";
	foreach ($tablas as $key => $value) {
	    $query .= $this->limpia_cadena($value) . " ";
	}


	if (!empty($condiciones)) {
	    $query .="WHERE ";
	    $contador = 1;
	    $tamano_arreglo = count($condiciones);
	    foreach ($condiciones as $key => $value) {
		if ($contador < $tamano_arreglo) {
		    $query .= $key . "=" . $this->limpia_cadena($value) . " and ";
		} else {
		    $query .= $key . "=" . $this->limpia_cadena($value);
		}
		$contador++;
	    }
	}
	$this->respuesta['consulta_sql'] = $query;
	$result = pg_query($this->conexion,$query);
	if ($result === TRUE) {
	    $this->respuesta['DDL'] = 'Operacion realizada con exito.';
	} elseif ($result === FALSE) {
	    $this->respuesta['error'][] = "No se encotraron datos.";
	} else {
	    if (pg_num_rows($result) == 0) {
		$this->respuesta['error'][] = "Por favor registrese.";
	    } else {
		while ($row = pg_fetch_array($result)) {
		    $this->respuesta['respuesta'] = $row;
		}
	    }
	}
	return $this->respuesta;
    }

}

?>