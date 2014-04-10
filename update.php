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
			$codigo = $codigo;
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
			$descripcion = $descripcion;
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
			$precio = $precio;
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
			$cantidad = $cantidad;
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
			$subtotal = $subtotal;
		}else{
			$subtotal = $subtotal.'|';
		}
		
	}
	
	
}

$total = $_POST['gTotal'];
$estado = 0;
$nota = $_POST['nota'];
$cNota = $_POST['id-nota'];


function update($codigo, $descripcion, $precio, $cantidad, $subtotal, $total, $nota, $cNota){
	$estado_ = 0;
	include 'conx/conx.php';
	if($ordenUpdate = $conx->query('CALL upOrder("'.$codigo.'", "'.$descripcion.'", "'.$precio.'", "'.$cantidad.'", "'.$subtotal.'", "'.$total.'", "'.$estado_.'", "'.$nota.'", "'.$cNota.'")')){
		return TRUE;
	}else{
		return FALSE;
	}
	
}

if(update($codigo, $descripcion, $precio, $cantidad, $subtotal, $total, $nota, $cNota)){
	echo $cNota.'|1';
}else{
	echo $cNota.'|0';
}

?>