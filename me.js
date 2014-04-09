/**
 * @author OSX
 */


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
		
		
		
	    	function upGTotal(){
	    		
	    		
	    		var totalFactura = '0';
	    		for (var i=1; i <= next; i++) {
				  totalFactura = parseInt(totalFactura) + parseInt($("#tot" + i).val());
				  $("#gTotal").val(totalFactura);
				};
	    		
	    	}
	    
	    /* actual row ID  start */
	    
	    	function aR(){
	    		aR = $(document.activeElement).attr('id');
	    		return aR;
	    	}
	    	
	    
	    
	    /* actual row ID  end */
	    
	    
	    /* Check for duplicated products start*/
	    
	    	function checkDup(){
	    		if (next > 1 ) {
	    			for (var i=1; i <= next; i++) {
					  if($('#'+ next).val() == $('#'+ i).val()){
					  	alert('El producto que esta ingresando ya se encuentra en esta nota. ¿Esta seguro de que desea ingresarlo?');
					  }
					};
	    		};
	    		
	    	}
	    
	    /* Check for duplicated products end*/
	    
			/*extrae numero de fila de id  */
			var actualRowTotal;
			
			function setActualCan(){
			        		actualRowTotal = $(document.activeElement).attr('id');
				    		actualRowTotal = actualRowTotal.substring(3,6);
				    		
			        	}
			        	
			        	
			/* calculo de total producto*/
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
			
function apClient(resArrayClient){
		$("#query-client-response").empty();
		$("#query-client-response").append(
			"<table>\
				<tr>\
					<td><strong>RUT: </strong></td>\
					<td>"+ resArrayClient[0] +"</td>\
				</tr>\
				<tr>\
					<td><strong>Razón Social: </strong></td>\
					<td>"+ resArrayClient[1] +"</td>\
				</tr>\
				<tr>\
					<td><strong>Dirección: </strong></td>\
					<td>"+ resArrayClient[2] +"</td>\
				</tr>\
				<tr>\
					<td><strong>Ciudad: </strong></td>\
					<td>"+ resArrayClient[3] +"</td>\
				</tr>\
				<tr>\
					<td><strong>Teléfono: </strong></td>\
					<td>"+ resArrayClient[4] +"</td>\
				</tr>\
				<tr>\
					<td><strong>Vendedor: </strong></td>\
					<td>"+ resArrayClient[5] +"</td>\
				</tr>\
			</table>"
		);
		$("#insert-client-button-div").show();
	}
	
	function errorResponseClient(){
		$("query-client-response").empty();
		$("#insert-client-div").hide();
		$("query-client-response").append('Cliente no encontrado. Por favor revise el RUT ingresado.');
	}
	
	
	
		///////Insert code
			$("#boton").click( insertClient() );
			function insertClient(){    			
    			var rut = resArrayClient[0];
    			var razonSocial = resArrayClient[1];
    			var direccion = resArrayClient[2];
    			var ciudad = resArrayClient[3];
    			var telefono = resArrayClient[4];
    			var vendedor = resArrayClient[5]
				$('#rut').val(rut);
				$('#rs').val(razonSocial);
				$('#dir').val(direccion);
				$('#ciudad').val(ciudad);
				$('#tel').val(telefono);
				$('#ven').val(vendedor);
				$('#insert-client-button-div').show();
				$( "#query-client" ).dialog( "close" );
			}
				
		//////Insert code	
		

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
				checkDup();
			}
			
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