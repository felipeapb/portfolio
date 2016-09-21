$(document).ready(function(){
		
	$('.c').click(function(){		
var destino =$(this).attr('data-destino');
$('.cont').fadeOut();
$('.'+destino).delay(200).fadeIn(600);
return false;
	});
	
	
})