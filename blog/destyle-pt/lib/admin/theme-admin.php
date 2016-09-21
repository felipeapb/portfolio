<?php

/*	##################################
   	THEME ADMIN
	################################## */

function ts_add_admin() {

	global $themename, $shortname, $options;

	if ( $_GET['page'] == basename(__FILE__) ) {

    	if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
			}
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } 
			}
			header("Location: themes.php?page=theme-admin.php&saved=true");
			die;
		} else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				if($value['type'] != 'multicheck'){
					delete_option( $value['id'] ); 
				}else{
					foreach($value['options'] as $mc_key => $mc_value){
						$del_opt = $value['id'].'_'.$mc_key;
						delete_option($del_opt);
					}
				}
			}
			header("Location: themes.php?page=theme-admin.php&reset=true");
			die;
		}
	}
	add_theme_page($themename, "$themename", 'edit_themes', basename(__FILE__), 'ts_admin');
}


function ts_admin() {

    global $themename, $shortname, $options;
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('Opções Guardadas','destyle').'</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('Opções Repostas','destyle').'</strong></p></div>';
?>

<div class="wrap">

<h2><?php $themename.' '._e('Opções','destyle'); ?> <small style="font-size:12px">&rsaquo; <?php _e('Problemas ou Dúvidas? Visite o nosso <a href="http://themeshift.com/support" target="_blank">fórum de suporte</a>.','destyle'); ?><br />Tema traduzido por <a href="http://www.wpthemespt.com" target="_blank">WPThemesPT.com</a></small></h2>

	<form method="post">
	
		<div id="poststuff" class="ui-sortable">

			<?php foreach ($options as $value) { 

			switch ( $value['type'] ) {

			case 'text': ?>
			
			<?php

			option_wrapper_header($value);

			?>

		    <input style="width:90%" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings($value['id'])); } else { echo $value['std']; } ?>" />

			<?php

			option_wrapper_footer($value);

			break;

			case "checkbox":

			option_wrapper_header_check($value);

					if(get_settings($value['id'])) {

							$checked = "checked=\"checked\"";

						} elseif($value['std'] == "true") {
						
							$checked = "checked=\"checked\"";
							
						} else {

							$checked = "";

						}

					?>

		            <p style="margin-bottom:20px"><input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />

			<?php

			option_wrapper_footer_check($value);
			break;

			case "box-open":

			?>
			
			<div class="postbox">
			
				<h3><?php echo $value['name']; ?></h3>
				
				<div class="inside">
				
					<table width="100%" cellpadding="10" cellspacing="10">		
		    
			<?php

			break;
			
			case "box-close":

			?>
					
					</table>
			
				</div><!-- end inside -->
			
			</div><!-- end postbox -->
			
			<p class="submit ts-submit">

						<input name="save" type="submit" class="button-primary" value="<?php _e('Guardar Opções','destyle'); ?>" />    
						<input type="hidden" name="action" value="save" />

					</p>
		    
			<?php

			break;
			
			default:
			break;

	}

}

?>
	
	</div>

</form>

<form method="post">

	<p class="submit">

		<input name="reset" type="submit" value="<?php _e('Repor','destyle'); ?>" />
		<input type="hidden" name="action" value="reset" />

	</p>

</form>

<?php

}

function option_wrapper_header($values){

	?>

	<tr><td valign="top" style="width:25%;padding-top:5px"><strong><?php echo $values['name']; ?>:</strong></td><td>

	<?php

}

function option_wrapper_footer($values){

	?>

	    <p><?php echo $values['desc']; ?></p></td></tr>

	<?php 

}

function option_wrapper_header_check($values){

	?>

	<tr><td valign="top" style="width:25%;padding-top:5px"><strong><?php echo $values['name']; ?>:</strong></td><td>

	<?php

}

function option_wrapper_footer_check($values){

	?>

	    <?php echo $values['desc']; ?></p></td></tr>

	<?php 

}

add_action('admin_menu', 'ts_add_admin');

?>