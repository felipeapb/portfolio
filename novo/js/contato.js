/* 
	JS da �rea de contato do site
	Programador: Rog�rio Almeida
	Cria��o: 15/09/2009
*/

$(document).ready(function(){

    //Esconde a div de id loading
	$(window).load(function () {
		$("#div_campos_obrigatorios").hide();					 
		$("#formCarregando").hide();
		$("#formProcessado").hide();
	});
	
	//Valida��o do form e AJAX de envio de email
	$("#botao").click(function(){
		var nome     = jQuery.trim($("#nome").val());
		var email    = jQuery.trim($("#email").val());
		var assunto  = jQuery.trim($("#assunto").val());
		var mensagem = jQuery.trim($("#mensagem").val());

        //Checa se algum campo est� vazio
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
/*
function contadorTexto() {
    var campo = document.getElementById("mensagem").value;
	var limiteMaximo = 255;
	if(campo.length > limiteMaximo) {
	    document.getElementById("mensagem").value = campo.substring(0, limiteMaximo);
		alert('Voc� atingiu o limite m�ximo de caracteres!');
    } 
}*/

$(document).ready(function() {



    xOffset=10; yOffset=20;



    $(".tooltip").hover(function(e){



        this.t=this.title;



        this.title="";



        $("body").append("<p id='tooltip'>"+ this.t +"</p>");



        $("#tooltip")



            .css("top",(e.pageY - xOffset) + "px")



            .css("left",(e.pageX + yOffset) + "px")



            .fadeIn("normal");



    },function(){



        this.title = this.t;



        $("#tooltip").remove();



    });



    $(".tooltip").mousemove(function(e){



        $("#tooltip")



            .css("top",(e.pageY - xOffset) + "px")



            .css("left",(e.pageX + yOffset) + "px");



    });



});
