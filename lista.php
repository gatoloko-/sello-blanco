<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "vendedor,admin";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "log.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
include 'query-orders.php';
include 'embed.php';

$lista = qOrders($_SESSION['MM_UserGroup'], $_SESSION['MM_Username']);
include 'nav-bar.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>HTML</title>
		<meta name="description" content="">
		<meta name="author" content="OSX">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<?php embed(); ?>
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<?php barra(); ?>
		<div id="main">
			<table class="CSSTableGenerator">
				<tr style="background: #000000; color: #FFFFFF;">
					<td width="150">Código</td>
					<td width="100">Fecha</td>
					<td width="120">Estado</td>
					<td width="80">Total</td>
					<td width="100">Cliente</td>
					<td width="160">Vendedor</td>
				</tr>
				
				<?php
					
					foreach ($lista as $key => $campo) {
						
						if ($campo[2]=1) {
							$estado = '<span style="background: #ff0000; color: #FFFFFF;">Sin enviar</span>';
						} else {
							$estado = '<span style="background: #00bc2c; color: #FFFFFF;">Enviada</span>';
						}
						
						echo "	<tr>
									<td><a href='nota.php?id-nota=".$campo[0]."&'>".$campo[0]."</a></td>
									<td>".$campo[1]."</td>
									<td>".$estado."</td>
									<td>".$campo[3]."</td>
									<td>".$campo[5]."</td>
									<td>".$campo[4]."</td>
								</tr>";
						
					}
				
				 ?>
				
			</table>
		</div>
	</body>
</html>
