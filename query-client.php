<?php

$rut = $_POST['crut'];


function qClient($rut){
	
	include_once 'conx/conx.php';
	$producto = $conx->query('CALL qClient("'.$rut.'")');//consulta
	$resultado = $producto->fetch_array(MYSQLI_NUM);	
	return $resultado;
		
	}	


	
$data = qClient($rut);//si producto esta con stock 0
	
	if ($data[0]!="") {
		foreach ($data as $key => $value) {
		echo utf8_encode($value)."|";
	}
	} else {
		echo utf8_encode("0000");//devuelve 0000 si no hay coincidencias
	}
	
	



?>