<?php

$id = $_GET['product'];

function altProduct($description){
	
	include 'conx/conx.php';
	$producto = $conx->query('CALL oProducts("'.$description.'")');//consulta
	while($resultado = $producto->fetch_all()){
		
		return $resultado;
	}
	
	

}
$data = altProduct($id);//si producto esta con stock 0

	foreach ($data as $key => $value) {
		echo $value;
	}

?>