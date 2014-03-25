<?php

$description = $_POST['description'];
$price = $_POST['price'];
function altProduct($description, $price){
	include_once 'conx/conx.php';
	$oProducto = $conx->query('CALL oProduct("'.$id.'")');//consulta

	while ($oResultado = $oProducto->fetch_assoc()) {
		return $oResultado;
		}
}

$data = altProduct($price, $description);//si producto esta con stock 0
if (isset($data)) {
	foreach ($data as $key => $value) {
	echo utf8_encode($value)."|";
}
	
} else {
	echo "Producto no encontrado. Por favor revise el código ingresado.";
}


?>