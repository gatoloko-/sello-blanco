<?php

function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_row()) {
        $rows[] = $row;
    }
    return $rows;
}

function qOrders($level, $uId){
	include 'conx/conx.php';
	if ($level=='admin') {
		
		
		$ordenes = $conx->query('CALL managerOrds()');//consulta
		$array = resultToArray($ordenes);	
		return $array;
		
	} else {
		
		$ordenes = $conx->query('CALL vendorOrds("'.$uId.'")');//consulta
		$array = resultToArray($ordenes);	
		return $array;
	}
	
	
	
}

?>