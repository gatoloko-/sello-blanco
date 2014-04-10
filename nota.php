<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>HTML</title>
		<meta name="description" content="">
		<meta name="author" content="gatoloko">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" href="jquery/ui/themes/base/jquery-ui.css" type="text/css" />
		<link rel="stylesheet" href="css/styles.css" type="text/css" />
		<script src="jquery/jquery-1.11.0.min.js"></script>
		<script src="jquery/ui/ui/jquery-ui.js"></script>
		<script type="text/javascript" src="me.js"></script>
		<script type="text/javascript" src="spin.min.js"></script>
		<script>
		var pNumber = 1;
		var next = pNumber;
		
			$(document).ready(function(){
				$('#addRow').click(
					function () {
						if (next<=100) {
							next = ++next;
					  		$('#products').append('<tr><td height="30"><input name="'+next+'" type="text" id="'+next+'" size="15" onclick="qProduct();"></td><td><input name="des'+next+'" type="text" id="des'+next+'" size="30"></td><td><input name="pre'+next+'" type="text" id="pre'+next+'" size="5" readonly=""></td><td><input name="can'+next+'" type="text" id="can'+next+'" size="5" onfocus="setActualCan();" onfocusout="calculateTotal(), upGTotal();"></td><td><input name="tot'+next+'" type="text" id="tot'+next+'" size="10" readonly="" onchange="upGTotal();"></td></tr>');

						} else{
							alert('Ha agregado el maximo de productos para esta nota');
						};
					}
				);
				
			});
			
			window.onbeforeunload = function (event) {
			  var message = 'Esta seguro de que desea cerrar la pagina?';
			  if (typeof event == 'undefined') {
			    event = window.event;
			  }
			  if (event) {
			    event.returnValue = message;
			  }
			  return message;
			}
			
			//spiner start

			var opts = {
			  lines: 13, // The number of lines to draw
			  length: 40, // The length of each line
			  width: 6, // The line thickness
			  radius: 30, // The radius of the inner circle
			  corners: 1, // Corner roundness (0..1)
			  rotate: 0, // The rotation offset
			  direction: 1, // 1: clockwise, -1: counterclockwise
			  color: '#000', // #rgb or #rrggbb or array of colors
			  speed: 1.4, // Rounds per second
			  trail: 22, // Afterglow percentage
			  shadow: false, // Whether to render a shadow
			  hwaccel: false, // Whether to use hardware acceleration
			  className: 'spinner', // The CSS class to assign to the spinner
			  zIndex: 2e9, // The z-index (defaults to 2000000000)
			  top: '50%', // Top position relative to parent in px
			  left: '50%' // Left position relative to parent in px
			};
			var target = document.getElementById('foo');
			var spinner = new Spinner(opts).spin(target);
			//spiner end
			
		</script>		
	</head>

	<body>
		<div id="modal" class="modal"></div>
		<div id="main">
        <form id="nota" action="save.php">
<script>     	   	
        	
$( "#nota" ).submit(function( event ) {

  // Stop form from submitting normally
event.preventDefault();
$('#modal').show();
spinner_div = $('#modal').get(0);
spinner.spin(spinner_div);
  // Get some values from elements on the page:
	
var $formMain = $( this ),
termMain = $( this ).serialize(),			    
urlMain = saveOrUpdate();
//urlMain = $formMain.attr( "action" );
checkDup();
alert(urlMain);
  // Send the data using post
var postingMain = $.post( urlMain, termMain);
 
  // Put the results in a div
postingMain.done(function( data ) {
	
saveResult = setArray(data);
 				 	
if (saveResult[1] =='1') {
$('#modal').hide();
spinner.stop();
$('#id-nota').val(saveResult[0]);
alert('La nota ha sido guardada');
} 
if (saveResult[1] =='0'){
$('#modal').hide();
spinner.stop();
alert('La nota no ha sido guardada. Intentelo nuevamente');
	  	};
  	
  	
  });
});
 </script>	
        
			<table border="0" cellspacing="5" cellpadding="5">
				<tr>
				    <td colspan="5">
				    	<table>
				    		<tr>
				    			<td>R.U.T.</td>
				    			<td><input type="text" id="rut" name="rut" onclick="qClient();"/></td>
				    			<td>Razón Social</td>
				    			<td><input type="text" id="rs" name="rs" /></td>			    			
				    		</tr>
				    		<tr>
				    			<td>Dirección</td>
				    			<td><input type="text" id="dir" name="dir" /></td>
				    			<td>Ciudad</td>
				    			<td><input type="text" id="ciudad" name="ciudad" /></td>			    			
				    		</tr>
				    		<tr>
				    			<td>Teléfono</td>
				    			<td><input type="text" id="tel" name="tel" /></td>
				    			<td>Vendedor</td>
				    			<td><input type="text" id="ven" name="ven" /></td>			    			
				    		</tr>
				    		<tr>
				    			<td>No Nota</td>
				    			<td><input type="text" id="id-nota" name="id-nota" /></td>
				    			<td>Fecha</td>
				    			<td><input type="text" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>"/></td>			    			
				    		</tr>
				    	</table>
					</td>
			  	</tr>
			  <tr>
			  	<td colspan="5"></td>
			  </tr>
			  <tr>
			  	<td colspan="5">
				    <table id="products" border="0" cellspacing="5" cellpadding="5">
				    	<tr>
					        <td height="30"><input name="1" type="text" id="1" size="15" onclick="qProduct();" onchange=""></td>
					        <td><input name="des1" type="text" id="des1" size="30"></td>
					        <td><input name="pre1" type="text" id="pre1" size="5" readonly=""></td>
					        <td><input name="can1" type="text" id="can1" size="5" onfocus="setActualCan();" onfocusout="calculateTotal(), upGTotal();"></td>
					        <td><input name="tot1" type="text" id="tot1" size="10" readonly="" ></td>
				        
				    	</tr>
				    </table>
			    </td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td><input type="button" name="addRow" id="addRow" value="Agregar Producto"></td>
			  </tr>
			  <tr>
			    <td colspan="4"><textarea id="nota" cols="50" name="nota" placeholder="Espacio para notas"/></textarea></td>
			    <td>Total Factura<input id="gTotal" name="gTotal"type="text" onchange="upGTotal();"/></td>
			  </tr>
			  <tr>
			  		<td><button id="save_btn">GUARDAR</button></td>
			  </tr>
			</table>
	</form>
	<div id="query-client">
			    		<table>
			    			<tr>
			    				<form id="query-client-form" action="query-client.php">
			    					<input type="text" name="crut" id="crut" value="76071530-1"/>
			    					<button>Consultar</button>
			    				</form>
			    				<div id="insert-client-div" style="display: none;"><button>Seleccionar Cliente</button></div>
			    				<div id="query-client-response"></div>
			    				<div id="insert-client-button-div" style="display: none;"><button onclick="insertClient();">Insertar Cliente</button> </div>
			    			</tr>
			    			
			    		</table>
			    	</div>
</div><!-- Main end-->

		<div id="query-product" >
			<table border="0" cellpadding="5" cellspacing="5">
				  <tr>
				    <td colspan="2">Busqueda de productos</td>
				    </tr>
				  <tr>
				    <td>Codigo</td>
				    <td>
				    <form id="query-product-form" action="query-product.php">
					      <input type="text" name="product" id="product">
					      <button id="check"  name="check">Consultar</button>
				     </form>
				      </td><br/>
						  </tr>
						  <tr>
						    <td colspan="2" class="error-message"></td>
						  </tr> 
						  <tr>
						    <td><strong>Codigo: </div></strong></td>
						    <td><div id="returned-code"></td>
						  </tr>
						  <tr>
						    <td><strong>Descripcion: </div></strong></td>
						    <td><div id="returned-description"></td>
						  </tr>
						  <tr>
						    <td><strong>Precio:  </div></strong></td>
						    <td><div id="returned-precio"></td>
						  </tr>
						  <tr>
						    <td><strong>Stock:  </strong></td>
						    <td><div id="returned-stock"></div></td>
						  </tr>
						  <tr>
						    <td colspan="2" id="insert-button-div"><button id='insert-button' style="display: none;" onclick='insertProduct();'>Agregar producto</button></td>
<script>
	
	/////post code
var resArrayClient;
var resultadoClient;
$( "#query-client-form" ).submit(function( event ) {
	
  // Stop form from submitting normally
  event.preventDefault();
  // Get some values from elements on the page:
  var $form2 = $( this ),
    term2 = $( "#crut" ).val(),
url2 = $form2.attr( "action" );
 
  // Send the data using post
  var posting2 = $.post( url2, { crut: term2 } );
 
  // Put the results in a div
  posting2.done(function( data ) {
  	
  	if (data == "0000") {
	errorResponseClient()
} else{
	resultadoClient = data
	resArrayClient = resultadoClient.split("|")
  		apClient(resArrayClient)
  	};
  });
});
//////////post code
</script>
						    
						  </tr> 
					</table>
			<div id="result"></div>
			<div id="optional-products-container"></div>
		</div>
<script>


$( "#query-product-form" ).submit(function( event ) {
 
		  // Stop form from submitting normally
  event.preventDefault();
 
  // Get some values from elements on the page:
  var $form = $( this ),
    term = $form.find( "input[name='product']" ).val(),
url = $form.attr( "action" );
 
  // Send the data using post
  var posting = $.post( url, { product: term } );
 
  // Put the results in a div
  posting.done(function( data ) {
  	
  	if (data == "1111") {
	errorResponse()
} else{
	var resultado = data
	var resArray = resultado.split("|")
  		ap(resArray)
  	};
  });
});
</script>
<div>
	<button id="b" onclick="varVal();">-------</button>
</div>
	</body>