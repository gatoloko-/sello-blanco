<?php

function altProduct($description){
	
	include 'conx/conx.php';
	$producto = $conx->query('CALL oProducts("'.$description.'")');//consulta

	$resultado = $producto->fetch_array(MYSQLI_NUM);
	
	return $resultado;
}

/*
$data = altProduct($price, $description);//si producto esta con stock 0
if (isset($data)) {
	foreach ($data as $key => $value) {
	echo utf8_encode($value)."|";
}
	
} else {
	echo "Producto no encontrado. Por favor revise el código ingresado.";
}

*/
?>