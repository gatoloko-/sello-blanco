<?php

$id = $_POST['product'];


function qPro($id)
{
	
	include_once 'conx/conx.php';
	$producto = $conx->query('CALL qProduct("'.$id.'")');//consulta

	while ($resultado = $producto->fetch_assoc()) {
		return $resultado;
		}	
}

	
$data = qPro($id);//si producto esta con stock 0
if (isset($data)) {
	foreach ($data as $key => $value) {
	echo utf8_encode($value)."|";
}
	
} else {
	echo "Producto no encontrado. Por favor revise el código ingresado.";
}



?>