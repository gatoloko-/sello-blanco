<?php

$description = $_GET['d'];

function altProduct($description){
	
	include 'conx/conx.php';
	$producto = $conx->query('CALL oProducts("'.$description.'")');//consulta

	$resultado = $producto->fetch_array(MYSQLI_NUM);
	
	return $resultado;
}

$var = altProduct($description);
foreach ($var as $key => $value) {
	echo $value;
}
?>