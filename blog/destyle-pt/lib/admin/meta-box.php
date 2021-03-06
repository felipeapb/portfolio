<?php

/*	##################################
   	CUSTOM META BOX
	################################## */

$new_meta_boxes =

array(	"image" => array(
    	"name" => "image",
    	"std" => "",
    	"title" => __('deStyle - Imagem do Artigo','destyle'),
    	"description" => __('Por favor insira o link da imagem (180x180px).','destyle'))
);

function new_meta_boxes() {
global $post, $new_meta_boxes;

	foreach($new_meta_boxes as $meta_box) {
	
		$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		if($meta_box_value == "") $meta_box_value = $meta_box['std'];
		
		echo'<div class="meta-field">';
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo'<p><strong>'.$meta_box['title'].'</strong></p>';
		
		echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" /><br />';
		
		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
		
		echo'</div>';
		
	} // end foreach
		
	echo'<br style="clear:both" />';
	
} // end new_meta_boxes

function create_meta_box() {

	global $theme_name;
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'new-meta-boxes', __('deStyle - Imagem do Artigo','destyle'), 'new_meta_boxes', 'post', 'normal', 'high' );
	}
}

function save_postdata( $post_id ) {
global $post, $new_meta_boxes;

foreach($new_meta_boxes as $meta_box) {

	// Verify
	if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
		return $post_id;
	}

	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ))
		return $post_id;
	} else {
	if ( !current_user_can( 'edit_post', $post_id ))
		return $post_id;
	}

$data = $_POST[$meta_box['name'].'_value'];

if(get_post_meta($post_id, $meta_box['name'].'_value') == "") 
	add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
	update_post_meta($post_id, $meta_box['name'].'_value', $data);
elseif($data == "" || $data == $meta_box['std'] )
	delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
	
	} // end foreach
} // end save_postdata

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

?>