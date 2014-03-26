<?php

$id = $_POST['product'];
include 'query-oproduct.php';

function qPro($id){
	
	include_once 'conx/conx.php';
	$producto = $conx->query('CALL qProduct("'.$id.'")');//consulta
	$resultado = $producto->fetch_array(MYSQLI_NUM);
	if ($resultado[2] == 0) {
		$resultado_ = altProduct($resultado[1]);
		$resultado = array_merge($resultado, $resultado_);
	} 
	
	while ($resultado) {
		return $resultado;
		echo $resultado[2];
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