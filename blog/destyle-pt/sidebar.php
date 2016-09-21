<div id="content-right">
				
	<?php include(TEMPLATEPATH .'/inc/sidebar-ads.php'); ?>
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

    <div id="sidebar-recent" class="box-right">
    
    	<h3 class="sidebar-title"><?php _e('Artigos Recentes','destyle'); ?></h3>
    	
    	<ul>
    	<?php $recent = new WP_Query("showposts=5"); while($recent->have_posts()) : $recent->the_post();?>
    		<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
    	<?php endwhile; ?>
    	</ul>
    
    </div><!-- end box-right -->
    
    <?php include(TEMPLATEPATH .'/inc/sidebar-twitter.php'); ?>
    
    <?php include(TEMPLATEPATH .'/inc/sidebar-flickr.php'); ?>
    
    <div id="sidebar-search" class="box-right clearfix">
    
    	<h3 class="sidebar-title"><?php _e('Pesquisar neste site','destyle'); ?></h3>

    	<?php include(TEMPLATEPATH .'/searchform.php'); ?>
    
    </div><!-- end box-right -->
    
    <div id="sidebar-bookmarks">
    
    	<?php wp_list_bookmarks('title_li=&category_before=<div class="box-right">&category_after=</div>&title_before=<h3 class="sidebar-title">&title_after=</h3>'); ?>
    
    </div>
    
    <?php endif; // endif dynamic sidebar ?>

</div><!-- end content-right -->