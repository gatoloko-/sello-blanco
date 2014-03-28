<?php

$id = $_POST['product'];

include 'query-oproduct.php';

function qPro($id){
	
	include_once 'conx/conx.php';
	$producto = $conx->query('CALL qProduct("'.$id.'")');//consulta
	$resultado = $producto->fetch_array(MYSQLI_NUM);
	if (isset($resultado[2])) {
		if ($resultado[2] == 0) {
		$resultado_ = altProduct($resultado[1]);
		if (isset($resultado_[1])) {
				for ($i=0; $i <= 1 ; $i++) {
					 
				for ($ii=0; $ii <= 3; $ii++) { 
					array_push($resultado, $resultado_[$i][$ii]);
				}
			}
		}
		
	}
		
	}
	
	
	while ($resultado) {
		return $resultado;
		}
	}	


	
$data = qPro($id);//si producto esta con stock 0
if (isset($data)) {
	foreach ($data as $key => $value) {
	echo utf8_encode($value)."|";
}
	
} else {
	echo "1111";
}



?>