<?php

/*	##################################
   	THEME OPTIONS
	################################## */

$themename = "deStyle";
$shortname = "destyle";

$options = array (

		array(	"name" => __('Geral','destyle'),
				"type" => "box-open"),
			    
		array(	"name" => __('Páginas no Menu','destyle'),
				"desc" => __('Insira os IDs das páginas que pretende <strong>excluir</strong> do menu. (ex.: 5,28,119).','destyle'),
			    "id" => $shortname."_exclude_pages",
			    "std" => "",
			    "type" => "text"),
			    
		array(	"name" => __('Categorias no Menu','destyle'),
				"desc" => __('Insira os IDs das categorias que pretende <strong>excluir</strong> do menu. (ex.: 2,13,45).','destyle'),
			    "id" => $shortname."_exclude_cats",
			    "std" => "",
			    "type" => "text"),
				
		array(	"name" => __('Informação sobre o Autor','destyle'),
				"desc" => __('Esconder a informação do autor depois do post?','destyle'),
				"id" => $shortname."_auth_dsp",
				"std" => "false",
				"type" => "checkbox"),
		
		array(	"name" => __('Posts Fixos','destyle'),
				"desc" => __('Ocultar a pequena imagem que aparece nos posts fixos?','destyle'),
				"id" => $shortname."_sticky_dsp",
				"std" => "false",
				"type" => "checkbox"),
		
		array(	"name" => __('Comentários','destyle'),
				"desc" => __('Esconder os comentários nas páginas? (Continua a aparecer nos posts)','destyle'),
				"id" => $shortname."_comments_dsp",
				"std" => "false",
				"type" => "checkbox"),
				
		array(	"name" => "end",
				"type" => "box-close"),
				
		array(	"name" => __('Barra lateral','destyle'),
				"type" => "box-open"),
			    
		array(	"name" => "Twitter",
				"desc" => __('Se você inserir o seu username do twitter, será mostrado na lateral do blog os últimos 6 twitts.','destyle'),
			    "id" => $shortname."_twitter",
			    "std" => "",
			    "type" => "text"),
				
		array(	"name" => __('<strong style="color:#3993ff">flick<span style="color:#ff1c92">r</span></strong>','destyle'),
				"desc" => __('Se você tiver o ID do flickr (<a href="http://www.idgettr.com" target="_blank">idGettr</a>) 9 imagens serão mostradas.','destyle'),
			    "id" => $shortname."_flickr_id",
			    "std" => "",
			    "type" => "text"),
				
		array(	"name" => "end",
				"type" => "box-close"),
				
		array(	"name" => __('Publicidade - Barra Lateral','destyle'),
				"type" => "box-open"),
				
		array(	"name" => __('Esconder a Publicidade','destyle'),
				"desc" => __('Seleccione se pretender esconder os anúncios da barra lateral.','destyle'),
				"id" => $shortname."_ads_dsp",
				"std" => "false",
				"type" => "checkbox"),
				
		array(	"name" => "Espaço #1 - ".__('Imagem','destyle'),
				"desc" => __('Insira o link direto para a imagem (125x125px).','destyle'),
			    "id" => $shortname."_sidebar_ad_1_img",
			    "std" => "",
			    "type" => "text"),
			    
		array(	"name" => "Espaço #1 - ".__('Link','destyle'),
					"desc" => __('Insira o link de destino do banner.','destyle'),
			    "id" => $shortname."_sidebar_ad_1_url",
			    "std" => "",
			    "type" => "text"),
				
		array(	"name" => "Espaço #1 - Nofollow",
				"desc" => __('Marque para que o banner fique sem o nofollow.','destyle'),
				"id" => $shortname."_sidebar_ad_1_rel",
				"std" => "false",
				"type" => "checkbox"),
			    
		array(	"name" => "Espaço #2 - ".__('Imagem','destyle'),
				"desc" => __('Insira o link direto para a imagem (125x125px).','destyle'),
			    "id" => $shortname."_sidebar_ad_2_img",
			    "std" => "",
			    "type" => "text"),
			    
		array(	"name" => "Espaço #2 - ".__('Link','destyle'),
				"desc" => __('Insira o link de destino do banner.','destyle'),
			    "id" => $shortname."_sidebar_ad_2_url",
			    "std" => "",
			    "type" => "text"),
				
		array(	"name" => "Espaço #2 - Nofollow",
				"desc" => __('Marque para que o banner fique sem o nofollow.','destyle'),
				"id" => $shortname."_sidebar_ad_2_rel",
				"std" => "false",
				"type" => "checkbox"),
			    
		array(	"name" => "Espaço #3 - ".__('Imagem','destyle'),
				"desc" => __('Insira o link direto para a imagem (125x125px).','destyle'),
			    "id" => $shortname."_sidebar_ad_3_img",
			    "std" => "",
			    "type" => "text"),
			    
		array(	"name" => "Espaço #3 - ".__('Link','destyle'),
				"desc" => __('Insira o link de destino do banner.','destyle'),
			    "id" => $shortname."_sidebar_ad_3_url",
			    "std" => "",
			    "type" => "text"),
				
		array(	"name" => "Espaço #3 - Nofollow",
				"desc" => __('Marque para que o banner fique sem o nofollow.','destyle'),
				"id" => $shortname."_sidebar_ad_3_rel",
				"std" => "false",
				"type" => "checkbox"),
			    
		array(	"name" => "Espaço #4 - ".__('Imagem','destyle'),
				"desc" => __('Insira o link direto para a imagem (125x125px).','destyle'),
			    "id" => $shortname."_sidebar_ad_4_img",
			    "std" => "",
			    "type" => "text"),
			    
		array(	"name" => "Espaço #4 - ".__('Link','destyle'),
				"desc" => __('Insira o link de destino do banner.','destyle'),
			    "id" => $shortname."_sidebar_ad_4_url",
			    "std" => "",
			    "type" => "text"),
				
		array(	"name" => "Espaço #4 - Nofollow",
				"desc" => __('Marque para que o banner fique sem o nofollow.','destyle'),
				"id" => $shortname."_sidebar_ad_4_rel",
				"std" => "false",
				"type" => "checkbox"),
			    
		array(	"name" => "Espaço #5 - ".__('Imagem','destyle'),
				"desc" => __('Insira o link direto para a imagem (125x125px).','destyle'),
			    "id" => $shortname."_sidebar_ad_5_img",
			    "std" => "",
			    "type" => "text"),
			    
		array(	"name" => "Espaço #5 - ".__('Link','destyle'),
				"desc" => __('Insira o link de destino do banner.','destyle'),
			    "id" => $shortname."_sidebar_ad_5_url",
			    "std" => "",
			    "type" => "text"),
				
		array(	"name" => "Espaço #5 - Nofollow",
				"desc" => __('Marque para que o banner fique sem o nofollow.','destyle'),
				"id" => $shortname."_sidebar_ad_5_rel",
				"std" => "false",
				"type" => "checkbox"),
			    
		array(	"name" => "Espaço #6 - ".__('Imagem','destyle'),
				"desc" => __('Insira o link direto para a imagem (125x125px).','destyle'),
			    "id" => $shortname."_sidebar_ad_6_img",
			    "std" => "",
			    "type" => "text"),
			    
		array(	"name" => "Espaço #6 - ".__('Link','destyle'),
				"desc" => __('Insira o link de destino do banner.','destyle'),
			    "id" => $shortname."_sidebar_ad_6_url",
			    "std" => "",
			    "type" => "text"),
				
		array(	"name" => "Espaço #6 - Nofollow",
				"desc" => __('Marque para que o banner fique sem o nofollow.','destyle'),
				"id" => $shortname."_sidebar_ad_6_rel",
				"std" => "false",
				"type" => "checkbox"),
				
		array(	"name" => "end",
				"type" => "box-close")
																								
);

?>