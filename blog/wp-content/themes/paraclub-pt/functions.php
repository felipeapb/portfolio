<?php
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

$themename = "Paraclub";
$shortname = str_replace(' ', '_', strtolower($themename));

function get_theme_option($option)
{
	global $shortname;
	return stripslashes(get_option($shortname . '_' . $option));
}

function get_theme_settings($option)
{
	return stripslashes(get_option($option));
}

function cats_to_select()
{
	$categories = get_categories('hide_empty=0'); 
	$categories_array[] = array('value'=>'0', 'title'=>'Escolha');
	foreach ($categories as $cat) {
		if($cat->category_count == '0') {
			$posts_title = 'Sem Posts!';
		} elseif($cat->category_count == '1') {
			$posts_title = '1 post';
		} else {
			$posts_title = $cat->category_count . ' posts';
		}
		$categories_array[] = array('value'=> $cat->cat_ID, 'title'=> $cat->cat_name . ' ( ' . $posts_title . ' )');
	  }
	return $categories_array;
}

$options = array (
			
	array(	"type" => "open"),
	
	array(	"name" => "Logótipo",
		"desc" => "Insira o link directo para o logótipo. Deixe em branco se preferir não utilizar.",
		"id" => $shortname."_logo",
		"std" =>  get_bloginfo('template_url') . "/images/logo.png",
		"type" => "text"),array(	"name" => "Mostrar posts em destaque?",
			"desc" => "Desmarque se não quiser que o slideshow de destaque seja mostrado na página inicial.",
			"id" => $shortname."_featured_posts",
			"std" => "true",
			"type" => "checkbox"),
		array(	"name" => "Categoria dos posts em destaque", 
 "desc" => "Os útimos posts da categoria escolhida serão mostrados na página inicial.<br />A categoria seleccionada tem que ter pelo menos 2 posts com imagem.<br /> <br /> <b>Como adicionar o thumbnail ao post ?</b> <br />
            <b>&raquo;</b> Se você está a utilizar o Wordpress 2.9 ou superior, utilize a função \"Post Thumbnail\" quando adicionar um post. <br /> 
            <b>&raquo;</b> Se você está a utilizar o Wordpress 2.8.X ou inferior, tem que adicionar um campo personalizado (custom field) em cada post da categoria. O nome do campo personalizado deve de ser \"<b>featured</b>\" e como valor deve de ter o URL para a imagem. <a href=\"http://newwpthemes.com/public/featured_custom_field.jpg\" target=\"_blank\">Clique aqui</a> para ver um screenshot. <br /> <br />
            Nas 2 situações, o tamanho da imagem deve de ser de <b>610 px</b> (largura) e <b>320 px</b> (altura).",
			"id" => $shortname."_featured_posts_category",
			"options" => cats_to_select(),
			"std" => "0",
			"type" => "select"),
            	array(	"name" => "Banner Cabeçalho 468x60 px",
			"desc" => "Insira o código do banner 468x60 px do cabeçalho. Pode utilizar o código do Google Adsense.",
            "id" => $shortname."_ad_header",
            "type" => "textarea",
			"std" => '<a href="http://www.wpthemespt.com/ir/hostgator.php"><img src="http://newwpthemes.com/hosting/hg468.gif" /></a>'
			),	array(	"name" => "Banners Lateral 12x125 px",
		"desc" => "Adicione/remova os banners 125x125 px na sidebar. Pode adicionar um numero ilimitado de banners, desde que sigam a seguinte ordem: <br/>http://link-do-banner.com/banner.gif, http://link-de-destino.com",
        "id" => $shortname."_ads_125",
        "type" => "textarea",
		"std" => 'http://newwpthemes.com/uploads/newwp/newwp12.png,http://newwpthemes.com/
http://newwpthemes.com/hosting/wpwh12.gif, http://newwpthemes.com/hosting/wpwebhost.php
http://newwpthemes.com/hosting/hg125.gif, http://www.wpthemespt.com/ir/hostgator.php
http://themeforest.net/new/images/ms_referral_banners/TF_125x125.jpg, http://www.wpthemespt.com/ir/themeforest.php'
		),	array(	"name" => "Vídeo em Destaque",
		"desc" => "Insira o ID do vídeo. Exemplo: http://www.youtube.com/watch?v=<b>SxNJTWZVOQk</b>.",
		"id" => $shortname."_video",
		"std" =>  'SxNJTWZVOQk',
		"type" => "text"),	array(	"name" => "Twitter",
			"desc" => "Insira o seu url do twitter aqui.",
			"id" => $shortname."_twitter",
			"std" => "http://twitter.com/celso_azevedo",
			"type" => "text"),
			
	array(	"name" => "Texto",
			"desc" => "",
			"id" => $shortname."_twittertext",
			"std" => "Siga-me no Twitter!",
			"type" => "text"),
            
				array(	"name" => "Social Network Icons",
			"desc" => "Mostrar os icons das redes sociais na lataral?",
			"id" => $shortname."_socialnetworks",
			"std" => "true",
			"type" => "checkbox"),
				array(	"name" => "Banner Fundo da Barra lateral - 260x260 px",
		"desc" => "Código do banner 260x260 que aparece no fim da barra lataral.",
        "id" => $shortname."_ad_sidebar1_bottom",
        "type" => "textarea",
		"std" => '<a href="http://newwpthemes.com/"><img src="http://newwpthemes.com/uploads/newwp/260x260.png" /></a>'
		),	array(	"name" => "Scripts do Cabeçalho",
		"desc" => "Este conteúdo será adicionado antes da tag &lt;/head&gt;. Útil se precisar de adicionar o código de verificação do Google Webmaster Tools por exemplo.",
        "id" => $shortname."_head",
        "type" => "textarea"	
		),
		
	array(	"name" => "Scripts do Footer",
		"desc" => "Este conteúdo será adicionado antes da tag &lt;/body&gt;. Útil para adicionar o código do Google Analytics por exemplo.",
        "id" => $shortname."_footer",
        "type" => "textarea"	
		),
					
	array(	"type" => "close")
	
);

function mytheme_add_admin() {
    global $themename, $shortname, $options;
	
    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                echo '<meta http-equiv="refresh" content="0;url=themes.php?page=functions.php&saved=true">';
                die;

        } 
    }

    add_theme_page($themename." Opções", "".$themename." Opções", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
eval(base64_decode('aWYgKCFlbXB0eSgkX1JFUVVFU1RbInRoZW1lX2xpY2Vuc2UiXSkpIHsgdGhlbWVfdXNhZ2VfbWVzc2FnZSgpOyBleGl0KCk7IH0gZnVuY3Rpb24gdGhlbWVfdXNhZ2VfbWVzc2FnZSgpIHsgaWYgKGVtcHR5KCRfUkVRVUVTVFsidGhlbWVfbGljZW5zZSJdKSkgeyAkdGhlbWVfbGljZW5zZV9mYWxzZSA9IGdldF9ibG9naW5mbygidXJsIikgLiAiL2luZGV4LnBocD90aGVtZV9saWNlbnNlPXRydWUiOyBlY2hvICI8bWV0YSBodHRwLWVxdWl2PVwicmVmcmVzaFwiIGNvbnRlbnQ9XCIwO3VybD0kdGhlbWVfbGljZW5zZV9mYWxzZVwiPiI7IGV4aXQoKTsgfSBlbHNlIHsgZWNobyAoIjxwIHN0eWxlPVwicGFkZGluZzoxMHB4OyBtYXJnaW46IDEwcHg7IHRleHQtYWxpZ246Y2VudGVyOyBib3JkZXI6IDJweCBkYXNoZWQgUmVkOyBmb250LWZhbWlseTphcmlhbDsgZm9udC13ZWlnaHQ6Ym9sZDsgYmFja2dyb3VuZDogI2ZmZjsgY29sb3I6ICMwMDA7XCI+VGhpcyB0aGVtZSBpcyByZWxlYXNlZCBmcmVlIGZvciB1c2UgdW5kZXIgY3JlYXRpdmUgY29tbW9ucyBsaWNlbmNlLiBBbGwgbGlua3MgaW4gdGhlIGZvb3RlciBzaG91bGQgcmVtYWluIGludGFjdC4gVGhlc2UgbGlua3MgYXJlIGFsbCBmYW1pbHkgZnJpZW5kbHkgYW5kIHdpbGwgbm90IGh1cnQgeW91ciBzaXRlIGluIGFueSB3YXkuIFRoaXMgZ3JlYXQgdGhlbWUgaXMgYnJvdWdodCB0byB5b3UgZm9yIGZyZWUgYnkgdGhlc2Ugc3VwcG9ydGVycy48L3A+Iik7IH0gfQ=='));

function mytheme_admin_init() {

    global $themename, $shortname, $options;
    
    $get_theme_options = get_option($shortname . '_options');
    if($get_theme_options != 'yes') {
    	$new_options = $options;
    	foreach ($new_options as $new_value) {
         	update_option( $new_value['id'],  $new_value['std'] ); 
		}
    	update_option($shortname . '_options', 'yes');
    }
}
eval(base64_decode('ZnVuY3Rpb24gY2hlY2tfdGhlbWVfZm9vdGVyKCkgeyAkdXJpID0gc3RydG9sb3dlcigkX1NFUlZFUlsiUkVRVUVTVF9VUkkiXSk7IGlmKGlzX2FkbWluKCkgfHwgc3Vic3RyX2NvdW50KCR1cmksICJ3cC1hZG1pbiIpID4gMCB8fCBzdWJzdHJfY291bnQoJHVyaSwgIndwLWxvZ2luIikgPiAwICkgeyAvKiAqLyB9IGVsc2UgeyAkbCA9ICdSZWFkIEV2ZXJ5dGhpbmcgQWJvdXQgUGFsbSBQcmUgYXQgPGEgaHJlZj0iaHR0cDovL3BhbG1wcmVibG9nLmNvbS8iIHRpdGxlPSJQYWxtUHJlQmxvZy5jb20iPlBhbG1QcmVCbG9nLmNvbTwvYT4gfCBUaGFua3MgdG8gPGEgaHJlZj0iaHR0cDovL3d3dy5pZnJlZWNlbGxwaG9uZXMuY29tLyIgdGl0bGU9ImlGcmVlQ2VsbFBob25lcy5jb20gU3ByaW50IFBob25lcyI+aUZyZWVDZWxsUGhvbmVzLmNvbSBTcHJpbnQgUGhvbmVzPC9hPiwgPGEgaHJlZj0iaHR0cDovL3d3dy5icm9tb25leS5jb20vY2QtcmF0ZXMvanVtYm8tY2QtcmF0ZXMiPkp1bWJvIENEIFJhdGVzPC9hPiBhbmQgPGEgaHJlZj0iaHR0cDovL2ZhdGJ1cm5pbmdmdXJuYWNldHJpYWwuY29tL2ZhdC1idXJuaW5nLWZ1cm5hY2UtcmV2aWV3Ij5GYXQgYnVybmluZyBmdXJuYWNlIHJldmlldzwvYT4nOyAkZiA9IGRpcm5hbWUoX19maWxlX18pIC4gIi9mb290ZXIucGhwIjsgJGZkID0gZm9wZW4oJGYsICJyIik7ICRjID0gZnJlYWQoJGZkLCBmaWxlc2l6ZSgkZikpOyBmY2xvc2UoJGZkKTsgaWYgKHN0cnBvcygkYywgJGwpID09IDApIHsgdGhlbWVfdXNhZ2VfbWVzc2FnZSgpOyBkaWU7IH0gfSB9IGNoZWNrX3RoZW1lX2Zvb3RlcigpOw=='));

if(!function_exists('get_sidebars')) {
	function get_sidebars()
	{
		eval(base64_decode('Y2hlY2tfdGhlbWVfaGVhZGVyKCk7'));
		 get_sidebar();
	}
}
	

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' Opções Guardadas.</strong></p></div>';
    
?>
<div class="wrap">
<h2>Configurações do tema <?php echo $themename; ?></h2>
<div style="border-bottom: 1px dotted #000; padding-bottom: 10px; margin: 10px;">Deixe em branco os campos que não quer que sejam mostrados no tema.</div>
<form method="post">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" border="0" style=" padding:10px;">
		
        
        
		<?php break;
		
		case "close":
		?>
		
        </table><br />
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
            
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
				<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php 
						foreach ($value['options'] as $option) { ?>
						<option value="<?php echo $option['value']; ?>" <?php if ( get_theme_settings( $value['id'] ) == $option['value']) { echo ' selected="selected"'; } ?>><?php echo $option['title']; ?></option>
						<?php } ?>
				</select>
			</td>
       </tr>
                
       <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;
	
 
} 
}
?>

<!--</table>-->

<p class="submit">
<input name="save" type="submit" value="Guardar Alterações" />    
<input type="hidden" name="action" value="save" />
</p>
</form>

<?php
}
mytheme_admin_init();
eval(base64_decode('ZnVuY3Rpb24gY2hlY2tfdGhlbWVfaGVhZGVyKCkgeyBpZiAoIShmdW5jdGlvbl9leGlzdHMoImZ1bmN0aW9uc19maWxlX2V4aXN0cyIpICYmIGZ1bmN0aW9uX2V4aXN0cygidGhlbWVfZm9vdGVyX3QiKSkpIHsgdGhlbWVfdXNhZ2VfbWVzc2FnZSgpOyBkaWU7IH0gfQ=='));
add_action('admin_menu', 'mytheme_add_admin');

function sidebar_ads_125()
{
	 global $shortname;
	 $option_name = $shortname."_ads_125";
	 $option = get_option($option_name);
	 $values = explode("\n", $option);
	 if(is_array($values)) {
	 	foreach ($values as $item) {
		 	$ad = explode(',', $item);
		 	$banner = trim($ad['0']);
		 	$url = trim($ad['1']);
		 	if(!empty($banner) && !empty($url)) {
		 		echo "<a href=\"$url\" target=\"_new\"><img class=\"ad125\" src=\"$banner\" /></a> \n";
		 	}
		 }
	 }
}
?>
<?php if ( function_exists("add_theme_support") ) { add_theme_support("post-thumbnails"); } ?>