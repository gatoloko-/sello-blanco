<?php

function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_row()) {
        $rows[] = $row;
    }
    return $rows;
}

function altProduct($description){
	
	include 'conx/conx.php';
	$producto = $conx->query('CALL oProducts("'.$description.'")');//consulta
	
	$array = resultToArray($producto);	
	return $array;
	
	

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