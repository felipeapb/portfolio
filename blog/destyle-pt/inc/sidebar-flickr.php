<?php

/*	##################################
   	FLICKR BADGE
	################################## */
	
?>

<?php
	$flickr_id = get_option('destyle_flickr_id');
	if ($flickr_id) :
?>
        
<div id="sidebar-flickr" class="box-right">
        
	<h3 class="sidebar-title"><?php _e('As minhas fotos no <strong style="color:#3993ff">flick<span style="color:#ff1c92">r</span></strong>','destyle'); ?></h3>
			
	<!-- Start of Flickr Badge -->
	<div id="flickr_badge_wrapper">
	
		<div class="clearfix">
			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flickr_id; ?>"></script>
		</div>
				
	</div>
	<!-- End of Flickr Badge -->
			
</div>
		
<?php endif; // endif flickr ?>