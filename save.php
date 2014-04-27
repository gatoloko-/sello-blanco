<?php

for ($i=1; $i <= 100 ; $i++) {
	
	//------------------------*****
	if (isset($_POST[''.$i.''])) {
		
		$code = $_POST[''.$i.''];
		if ($i == 1) {
			$codigo = $code;
		} else {
			$codigo = $codigo.'|'.$code;
		}
	
	}else{
		if($i == 100){
			$codigo = $codigo.'|';
		}else{
			$codigo = $codigo.'|';
		}
		
	} 
	
	
	//------------------------*****
	if (isset($_POST['des'.$i.''])) {
		
		$description = $_POST['des'.$i.''];
		if ($i == 1) {
			$descripcion = $description;
		}else{
			$descripcion = $descripcion.'|'.$description;
		}
	}else{
		if($i == 100){
			$descripcion = $descripcion.'|';
		}else{
			$descripcion = $descripcion.'|';
		}
		
	}
	
	
	//------------------------*****
	if (isset($_POST['pre'.$i.''])){
		
		$price = $_POST['pre'.$i.''];
		if ($i == 1) {
			$precio = $price;
		}else{
			$precio = $precio.'|'.$price;
		}
	}else{
		if($i == 100){
			$precio = $precio.'|';
		}else{
			$precio = $precio.'|';
		}
		
	}
	
	
	//------------------------*****
	if (isset($_POST['can'.$i.''])){
		
		$number = $_POST['can'.$i.''];
		if ($i == 1) {
			$cantidad = $number;
		}else{
			$cantidad = $cantidad.'|'.$number;
		}

	}else{
		if($i == 100){
			$cantidad = $cantidad.'|';
		}else{
			$cantidad = $cantidad.'|';
		}
		
	}
	
	
	//------------------------*****
	if (isset($_POST['tot'.$i.''])){
		
		$subt = $_POST['tot'.$i.''];
		if ($i == 1) {
			$subtotal = $subt;
		}else{
			$subtotal = $subtotal.'|'.$subt;
		}
		
	}else{
		if($i == 100){
			$subtotal = $subtotal.'|';
		}else{
			$subtotal = $subtotal.'|';
		}
		
	}
	
	
}

$total = $_POST['gTotal'];
$fecha = $_POST['fecha'];
$estado = 0;
$vendedor = $_POST['ven'];
$cliente = $_POST['rut'];
$nota = $_POST['nota'];
$cNota = date('d-m-Y').'-'.randSt(5);
$pago = $_POST['pago'];
$trans = $_POST['trans'];



function randSt( $length ) {
	$word = "";
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
	for ($i=1; $i <=  $length; $i++) {
		$letra = substr($chars, rand(0, strlen($chars)), 1);
		$word = $word.$letra;
	}
	return $word;
}


function save($codigo, $descripcion, $precio, $cantidad, $subtotal, $total, $fecha, $estado, $vendedor, $cliente, $nota, $cNota, $pago, $trans){
	include 'conx/conx.php';
	if($ordenSave = $conx->query('CALL saveOrder("'.$codigo.'", "'.$descripcion.'", "'.$precio.'", "'.$subtotal.'", "'.$total.'", "'.$estado.'", "'.$vendedor.'", "'.$cliente.'", "'.$cantidad.'", "'.$cNota.'", "'.$fecha.'", "'.$nota.'", "'.$pago.'", "'.$trans.'")')){
		return TRUE;
	}else{
		return FALSE;
	}
	
}



		
if(save($codigo, $descripcion, $precio, $cantidad, $subtotal, $total, $fecha, $estado, $vendedor, $cliente, $nota, $cNota, $pago, $trans)){
	echo $cNota.'|1';
}else{
	echo $cNota.'|0';
}
	


?>