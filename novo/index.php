<? include('topo.php')?>
 <!--Conteúdo-->
  <div class="mais_infos">
    <div class="quem_sou"> <span class="title">Felipe Antunes</span>
      <p>Meu nome é Felipe Antunes, carioca de nascimento e capixaba de criação e me formei em publicidade pela Universidade Federal do Espírito Santo.</p>
      <p> Ao voltar ao Rio de Janeiro optei cursar a formação webmaster da Infnet, porém a maioria dos meus conhecimentos foram adquiridos por leitura, pela internet ou pela experiência que consegui nas empresas que trabalhei. </p>
      <p>Carioca apaixonado, fã de seriados e tenho a internet como fonte de aprendizado, informação e diversão. </p>
      <div class="curriculo"> <a href="http://felipeantunes.com/wordcurriculo.doc" target="_blank" class="curr word" title="Curriculo em Word" ></a> <a href="http://felipeantunes.com/pdfcurriculo.pdf" target="_blank" class="curr pdf" title="Curriculo em PDF"></a> <span>Baixar curriculo >></span> </div>
    </div>
    <div class="contato"> <span class="title">Contato</span> Para pedir um orçamento, tirar alguma dúvida ou apenas mandar uma mensagem use o formulário abaixo.
      <div class="formulario">
        <div id="div_campos_obrigatorios" class="erro"  style="display:none;">Todos os campos do formulário são obrigatórios!</div>
        <div id="formProcessado" class="sucesso" align="center" style="display:none;"> <b>Email enviado com sucesso!</b> <br/>
          Responderei em breve, obrigado! </div>
        <div id="formCarregando" align="center" style="display:none;"> <img src="img/ajax-loader.gif" border="0px" alt="Carregando"/><br />
          <h3><b>[Processando...]</b></h3>
        </div>
        <form>
          <p>
            <label>Nome</label>
            <input name="nome" id="nome" type="text" class="form1" />
          </p>
          <p>
            <label>Email</label>
            <input type="text" name="email" id="email" class="form1" />
          </p>
          <p>
            <label>Assunto</label>
            <input name="assunto" id="assunto" type="text" class="form1" />
          </p>
          <p class="mensagem" >
            <textarea name="mensagem" id="mensagem"></textarea>
          </p>
          <input type="button" class="botao" value="" id="botao" name="botao">
        </form>
      </div>
    </div>
    <div class="redes"> <span class="title">Rede sociais</span>
      <div class="social"> <a href="http://www.orkut.com.br/Main#Profile?uid=10404575291161261896" target="_blank" class="orkut" title="Orkut"></a> <a href="http://www.facebook.com/felipeapb" class="facebook" title="facebook"></a> <a href="http://www.twitter.com/felipeantunes" class="twitter" target="_blank" title="twitter"></a> <a href="http://www.youtube.com/pluc" class="youtube" title="youtube" target="_blank"></a> <a href="http://www.google.com/profiles/felipeapb" class="google" title="Google" target="_blank"></a> </div>
      <span class="title">No twitter</span>
      <div class="twt">
        <div class="twt_text">
        	<div id="twitter"></div>
		</div>
      </div>
    </div>
  </div>
</div>
<!--rodape-->
<? include('rodape.php')?>

