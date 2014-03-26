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
			$( "#query-product" ).dialog({ autoOpen: false, width: 800, modal: true });
			$( "#query-product" ).dialog( "open" );
			
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
	</head>

	<body>
		<div id="main">
        <form>
			<table border="0" cellspacing="5" cellpadding="5">
			  <tr>
			    <td colspan="5">&nbsp;</td>
			  </tr>
			  <tr>
			    <td colspan="5">&nbsp;</td>
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
			    </table></td>
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
		</div>
		<div id="query-product" >
			<table border="0" cellpadding="5" cellspacing="5">
				  <tr>
				    <td colspan="2">Busqueda de productos</td>
				    </tr>
				  <tr>
				    <td>Codigo</td>
				    <td>
				    <form id="query-product-form" action="query-product.php">
				      <input type="text" name="product" id="product"><button id="check"  name="check">Consultar</button>
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
		</div>
		<script>
		
		function ap (resArray){ //function appends result to content
			$(".error-message").empty();
			$("#returned-code").empty();
			$("#returned-description").empty();
			$("#returned-precio").empty();
			$("#returned-stock").empty();
			$("#insert-button").hide();
			//$("#insert-button-div").empty();
			
			$("#returned-code").append( resArray[0] );
			$("#returned-description").append( resArray[1] );
			$("#returned-precio").append( resArray[3] );
			if(resArray[2] == 0){
				$("#returned-stock").append("<span style='color: #ff0000;'>Este producto esta agotado</span>" + resArray[4]);
			}else{
				$("#returned-stock").append( resArray[2] );
			}
			if(resArray[2] != 0){
			$("#insert-button").show();
			}
			//$("#insert-button-div").append( "<button id='insert-button' onclick='insertProduct(actualRow);'>Agregar producto</button>" );
			
			
		}
		function errorResponse (){
			$(".error-message").empty();
			$(".error-message").append("Producto no encontrado. Por favor revise el código ingresado.");
			$("#returned-code").empty();
			$("#returned-description").empty();
			$("#returned-precio").empty();
			$("#returned-stock").empty();
			$("#insert-button-div").empty();
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
		  	
		  	if (data == "Producto no encontrado. Por favor revise el cdigo ingresado.") {
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