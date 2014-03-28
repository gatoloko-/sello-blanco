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

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" href="jquery/ui/themes/base/jquery-ui.css" type="text/css" />
		<link rel="stylesheet" href="css/styles.css" type="text/css" />
		<script src="jquery/jquery-1.11.0.min.js"></script>
		<script src="jquery/ui/ui/jquery-ui.js"></script>
		<script>
		var pNumber = 1;
		var next = pNumber;
		
			$(document).ready(function(){
				$('#addRow').click(
					function () {
						if (next<=100) {
							next = ++next;
					  $('#products').append('<tr><td height="30"><input name="'+next+'" type="text" id="'+next+'" size="15" onclick="qProduct();"></td><td><input name="des'+next+'" type="text" id="des'+next+'" size="30"></td><td><input name="pre'+next+'" type="text" id="pre'+next+'" size="5"></td><td><input name="can'+next+'" type="text" id="can'+next+'" size="5" onfocus="setActualCan();" onfocusout="calculateTotal();"></td><td><input name="tot'+next+'" type="text" id="tot'+next+'" size="10" disabled=""></td></tr>');

						} else{};
											}
				);
				
			});
		</script>
		<script>
		function qProduct(){
			actualRow = $(document.activeElement).attr('id');
			alert(actualRow);
			$( "#query-product" ).dialog({ autoOpen: false, width: 800, modal: true, position: { my: "center top", at: "center top", of: window } });
			$( "#query-product" ).dialog( "open" );
			
		}
		function qClient(){
			$( "#query-client" ).dialog({ autoOpen: false, width: 800, modal: true, position: { my: "center top", at: "center top", of: window } });
			$( "#query-client" ).dialog( "open" );
			
		}
		</script>
		
		<script>
			var actualRowTotal;
			function setActualCan(){
			        		actualRowTotal = $(document.activeElement).attr('id');
				    		actualRowTotal = actualRowTotal.substring(3,6);
				    		
			        	}
		
			function calculateTotal(){
				
	    		
	    		if ( $("#can" + actualRowTotal).val() == "" || !$("#can" + actualRowTotal).val().match(/[0-9]$/) ) {
			    			alert('Ingrese una cantidad valida');
			    				
	    		}else{ 
		    		if ( $("#can" + actualRowTotal).val() != "" || $("#can" + actualRowTotal).val().match(/[0-9]$/) ){
		    			var cantidad = $("#can" + actualRowTotal).val();
			    		var precio = $("#pre" + actualRowTotal).val();
			    		var total = parseInt(cantidad) * parseInt(precio);
			    		$("#can" + actualRowTotal).change($('#tot' + actualRowTotal).val(total));
			    	}
		    	}
			
	    	}
	    </script>
	    
	    <script>
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
	    </script>
	</head>

	<body>
		<div id="main">
        <form>
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
			        <td height="30"><input name="1" type="text" id="1" size="15" onclick="qProduct();"></td>
			        <td><input name="des1" type="text" id="des1" size="30"></td>
			        <td><input name="pre1" type="text" id="pre1" size="5" disabled=""></td>
			        <td><input name="can1" type="text" id="can1" size="5" onfocus="setActualCan();" onfocusout="calculateTotal();"></td>
			        <td><input name="tot1" type="text" id="tot1" size="10" disabled=""></td>
			        
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
			    <td width="107">&nbsp;</td>
			    <td width="212">&nbsp;</td>
			    <td width="37">&nbsp;</td>
			    <td width="37">&nbsp;</td>
			    <td width="72">&nbsp;</td>
			  </tr>
			</table>
	</form>
	<div id="query-client">
			    		<table>
			    			<tr>
			    				<form id="query-client-form" action="query-client.php">
			    					<input type="text" id="crut" name="crut" />
			    					<button>Consultar</button>
			    				</form>
			    				<div id="insert-client-div" style="display: none;"><button>Seleccionar Cliente</button></div>
			    				<div id="query-client-response"></div>
			    				
			    			</tr>
			    			
			    		</table>
			    	</div>
</div><!-- Main end-->
<script>
	function apClient(resArrayClient){
		$("#query-client-response").empty();
		$("#query-client-response").append(
			"<table>\
				<tr>\
					<td>RUT</td>\
					<td>"+ resArrayClient[0] +"</td>\
				</tr>\
				<tr>\
					<td>RUT</td>\
					<td>"+ resArrayClient[1] +"</td>\
				</tr>\
				<tr>\
					<td>RUT</td>\
					<td>"+ resArrayClient[2] +"</td>\
				</tr>\
				<tr>\
					<td>RUT</td>\
					<td>"+ resArrayClient[3] +"</td>\
				</tr>\
				<tr>\
					<td>RUT</td>\
					<td>"+ resArrayClient[4] +"</td>\
				</tr>\
				<tr>\
					<td>RUT</td>\
					<td>"+ resArrayClient[5] +"</td>\
				</tr>\
			</table>"
		);
	}
	
	function errorResponseClient(){
		$("query-client-response").empty();
		$("#insert-client-div").hide();
		$("query-client-response").append('Cliente no encontrado. Por favor revise el RUT ingresado.');
	}
	
	/////post code
		$( "#query-client-form" ).submit(function( event ) {
		
		  // Stop form from submitting normally
		  event.preventDefault();
		  // Get some values from elements on the page:
		  var $form = $( this ),
		    term = $form.find( "input[name='crut']" ).val(),
		    url = $form.attr( "action" );
		 
		  // Send the data using post
		  var posting = $.post( url, { crut: term } );
		 
		  // Put the results in a div
		  posting.done(function( data ) {
		  	
		  	if (data == "0000") {
		  		errorResponseClient()
		  	} else{
		  		var resultadoClient = data
		  		var resArrayClient = resultadoClient.split("|")
		  		apClient(resArrayClient)
		  	};
		  });
		});
		//////////post code
	</script>
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
						    	
						    	function insertProduct (){
						    			
						    			var code = $('#returned-code').html();
						    			var description = $('#returned-description').html();
						    			var price = $('#returned-precio').html();
										$('#' + actualRow).val(code);
										$('#des' + actualRow).val(description);
										$('#pre' + actualRow).val(price);
										$(".error-message").empty();
										$("#returned-code").empty();
										$("#returned-description").empty();
										$("#returned-precio").empty();
										$("#returned-stock").empty();
										$("#insert-button").hide();
										$("#product").val("");
										$( "#query-product" ).dialog( "destroy" );
									}
						    </script>
						    
						  </tr> 
					</table>
			<div id="result"></div>
			<div id="optional-products-container"></div>
		</div>
		<script>
		
		function ap (resArray){ //function appends result to content
			$(".error-message").empty();
			$("#returned-code").empty();
			$("#returned-description").empty();
			$("#returned-precio").empty();
			$("#returned-stock").empty();
			$("#insert-button").hide();
			$("#optional-products-container").empty();
			//$("#insert-button-div").empty();
			
			$("#returned-code").append( resArray[0] );
			$("#returned-description").append( resArray[1] );
			$("#returned-precio").append( resArray[3] );
			if(resArray[2] == 0){
				$("#returned-stock").append("<span style='color: #ff0000;'>Este producto esta agotado</span>");
				for (var i=0; i <= 22; i++) {
				  if (typeof resArray[i] == 'undefined'|| resArray[i] == "") { 
				  	resArray[i] = "";
				  	}
				};
				if (resArray[4]=="") {
					$("#optional-products-container").append("<div align='center'><strong>NO HAY PRODUCTOS SUGERIDOS</strong><br/></div>");
				} else{
					
				
				$("#optional-products-container").append(
					"<table>\
					<tr>\
						<td colspan='2'>\
						<div align='center'><strong>PRODUCTOS SUGERIDOS</strong><br/></div>\
						</td>\
					</tr>\
					<tr>\
						<td><strong>Codigo</strong></td>\
						<td><strong>Descripcion</strong></td>\
						<td><strong>Stock</strong></td>\
						<td><strong>Precio</strong></td>\
					</tr>\
					<tr >\
						<td width='150'>" + resArray[4] + "</td>\
						<td width='400'>" + resArray[5] + "</td>\
						<td>" + resArray[6] + "</td>\
						<td>" + resArray[7] + "</td>\
					</tr>\
					<tr >\
						<td>" + resArray[8] + "</td>\
						<td>" + resArray[9] + "</td>\
						<td>" + resArray[10] +"</td>\
						<td>" + resArray[11] + "</td>\
					</tr>\
					<tr>\
						<td>" + resArray[12] + "</td>\
						<td>" + resArray[13] + "</td>\
						<td>" + resArray[14] + "</td>\
						<td>" + resArray[15] + "</td>\
					</tr>\
					<tr>\
						<td>" + resArray[16] + "</td>\
						<td>" + resArray[17] + "</td>\
						<td>" + resArray[18] + "</td>\
						<td>" + resArray[18] + "</td>\
					</tr>\
					<tr>\
						<td>" + resArray[19] + "</td>\
						<td>" + resArray[20] + "</td>\
						<td>" + resArray[21] + "</td>\
						<td>" + resArray[22] + "</td>\
					</tr>\
				</table>"
				);
				};
			}else{
				$("#returned-stock").append( resArray[2] );
			}
			if(resArray[2] != "0" && resArray[2] != 'undefined'){
			$("#insert-button").show();
			}
			
			//$("#insert-button-div").append( "<button id='insert-button' onclick='insertProduct(actualRow);'>Agregar producto</button>" );
			
			
		}
		function errorResponse (){
			$(".error-message").empty();
			$(".error-message").append("<span style='color: red;'>Producto no encontrado. Por favor revise el código ingresado.</span>");
			$("#returned-code").empty();
			$("#returned-description").empty();
			$("#returned-precio").empty();
			$("#returned-stock").empty();
			$("#insert-button").hide();
			$("#optional-products-container").empty();
		}
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
	</body>