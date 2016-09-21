$(document).ready(function(e) {
$( ".abrir_menu" ).click(function() {
	$('.menu_exibir').next().slideToggle('slow')
  
});


$( ".abrir_aba" ).click(function() {
	  $('.abrir_aba').hide();
	
  $( ".aba_about" ).animate({
    opacity: 100,
	width:'50%',
  }, 600, function() {
  
	$('.fechar_aba').show();
	  $('.descricao').fadeIn(600);
  });
});




$( ".fechar_aba" ).click(function() {
	   
	$('.fechar_aba').hide();
	$('.descricao').hide();
	
  $( ".aba_about" ).animate({
    opacity: '100%',
	width:'0%',
  }, 600, function() {
	   $('.abrir_aba').show();
    // Animation complete.
  });
});});





$( document ).ready(function() {
	
	$( ".abrefoto" ).click(function() {
		var foto= $(this).attr('href');
		var texto= $(this).attr('title');
		$( ".ver_texto" ).text(texto);
		$( ".ver_img" ).html('<img src="'+foto+'" width=580 height=380 >');
		$( ".exibir_imagem" ).fadeIn(1000);

	return false;  
	
});
$( ".fechar" ).click(function() {
		$( ".exibir_imagem" ).hide();
	})

	
	//.parallax(xPosition, speedFactor, outerHeight) options:
	//xPosition - Horizontal position of the element
	//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
	//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
	

        $('#myStat1').circliful();
		$('#myStat2').circliful();
		$('#myStat3').circliful();
		$('#myStat4').circliful();
    $('#myStat5').circliful();
    $('#myStat6').circliful();
    $('#myStat7').circliful();
		//portfolio
	
$('#s2').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 4000, 
    next:   '#next', 
    prev:   '#prev' 
});
$('.pfolio').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 15000, 
    next:   '#v', 
    prev:   '#a' 
});
 });
 
/* 
	JS da área de contato do site
	Programador: Rogério Almeida
	Criação: 15/09/2009
*/

$(document).ready(function(){

    //Esconde a div de id loading
	$(window).load(function () {
	$("#div_campos_obrigatorios").hide();					 
		$("#formCarregando").hide();
		$("#formProcessado").hide();
	});
	
	//Validação do form e AJAX de envio de email
	$("#botao").click(function(){
		var nome     = jQuery.trim($("#nome").val());
		var email    = jQuery.trim($("#email").val());
		var assunto  = jQuery.trim($("#assunto").val());
		var mensagem = jQuery.trim($("#mensagem").val());

        //Checa se algum campo está vazio
		if(nome != "" && email != "" && assunto != "" && mensagem != "") {
			$("#div_formulario").hide();
			$("#formCarregando").show();
			
			$.ajax({
				type: "POST",
				url: "RPC_contato.php",
				data: "nome="+nome+"&email="+email+"&assunto="+assunto+"&mensagem="+mensagem,
				success: function(ret){
					if(ret == 'ok') {
						$("#formCarregando").hide();	
						$("#formProcessado").show();
						$("#div_campos_obrigatorios").hide();
					} else {
						alert('Problema no envio do email. Favor entrar em contato pelo email felipeapb@gmail.com');
					}
				}		
			});
		} else {
			if( nome == "" || email == "" || assunto == "" || mensagem == "" ) { 
				$("#div_campos_obrigatorios").show();
				$("#formProcessado").hide();
			}
		}
	});
	
});

	


		
		
