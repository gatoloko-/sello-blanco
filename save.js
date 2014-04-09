/**
 * @author OSX
 */

$( "#nota" ).submit(function( event ) {

  // Stop form from submitting normally
  event.preventDefault();
  
  // Get some values from elements on the page:
  var $formMain = $( this ),
    term2 = $formMain.serialize(),
	urlMain = $formMain.attr( "action" );
 
  // Send the data using post
  var posting2 = $.post( url2, term2 );
 
  // Put the results in a div
  posting2.done(function( data ) {
  	$('#notaID').val(data);
  });
});

