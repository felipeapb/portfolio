<?php

/*	##################################
   	TWITTER BADGE
	################################## */
	
?>

<?php
	$twitter = get_option('destyle_twitter');
	if($twitter) :
?>
        
	<div id="sidebar-twitter" class="box-right">
        
		<h3 class="sidebar-title"><?php _e('Os meus ultimos Twitts','destyle'); ?></h3>
			
		<div id="twitter_div">
			<ul id="twitter_update_list"><li></li></ul>
		</div>
	
		<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
		<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $twitter; ?>.json?callback=twitterCallback2&amp;count=5"></script>
	
		<p><?php _e('Siga-me no','destyle'); ?> <a href="http://twitter.com/<?php echo $twitter; ?>" target="_blank">Twitter</a></p>
			
	</div>

<?php endif; // endif twitter ?>