<?php get_header(); ?>

<div id="content-left">

<?php if (have_posts()) : ?>
		
	<?php /* If this is a category archive */ if (is_category()) { ?>
	    <h1 class="category-title"><?php single_cat_title(); ?></h1>
	    
 	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	    <h1 class="category-title"><?php single_tag_title(); ?></h1>
	    
 	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	    <h1 class="category-title"><?php _e('Arquivo','destyle'); ?> <?php the_time(get_option('date_format')); ?></h1>
	    
 	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	    <h1 class="category-title"><?php _e('Arquivo','destyle'); ?> <?php the_time('F Y'); ?></h1>
	    
 	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	    <h1 class="category-title"><?php _e('Arquivo','destyle'); ?> <?php the_time('Y'); ?></h1>
	    
 	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	    <h1 class="category-title"><?php _e('Arquivo','destyle'); ?></h1>
	    
 	<?php } ?>

	<?php while (have_posts()) : the_post(); ?>
		
			<div <?php if(function_exists('post_class')) : post_class(); else : echo 'class="post"'; endif; ?>>
			
			<div class="box-left clearfix">
				
					<div class="article-left clearfix">
				
						<?php if(get_post_meta($post->ID, "image_value", true)) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/lib/thumb.php?src=<?php echo get_post_meta($post->ID, "image_value", true); ?>&amp;w=180&amp;h=180&amp;zc=1&amp;q=95" class="article-img" width="180" height="180" alt="<?php the_title(); ?>" /></a><?php else : ?><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/default.jpg" class="article-img" alt="<?php the_title(); ?>" width="180" height="180"/></a><?php endif; ?><div class="img-caption"><?php comments_popup_link(__('0 comments','destyle'), __('1 comment','destyle'), __('% comments','destyle'),'',__('Comments off','destyle')); ?></div>
						
						<?php if(is_sticky() && !get_option('destyle_sticky_dsp')) : ?>
							<div class="sticky-post"><img src="<?php bloginfo('template_url'); ?>/img/sticky.png" alt="sticky" width="50" height="50"/></div>
						<?php endif; ?>
					
					</div>
					
					<div class="article-right">
				
						<h2 class="article-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="article-meta"><?php the_time(get_option('date_format')); ?> <?php _e('em','destyle'); ?> <?php the_category(', '); ?></div>
		
						<?php the_content(__('Ler mais...','destyle')); ?>
					
					</div>
					
				</div>
				
			</div><!-- end box-left -->
		
		<?php endwhile; ?>
		
		<?php global $wp_query; if($wp_query->max_num_pages > 1) : ?>
		<div id="paging" class="clearfix">
		
        	<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?>
        	
		<div style="float:left">
		    <?php next_posts_link(__('&laquo; Artigos Anteriores','destyle')); ?>
		</div>
		<div style="float:right">
		 	<?php previous_posts_link(__('Artigos Recentes &raquo;','destyle')); ?>
        	</div>
        	
        	<?php endif; ?>
            
		</div><!-- end paging -->
		<?php endif; ?>
		
		<?php else : ?>
		
		<div class="box-left">

	    <h2 class="article-title"><?php _e('Nada Encontrado!','destyle'); ?></h2>
	    <p><?php _e('Lamentamos, mas não foram encontrados artigos.','destyle'); ?></p>
	    <?php include (TEMPLATEPATH . "/searchform.php"); ?>
		
		</div>

<?php endif; ?>
	
	  </div><!-- end content-left -->
	  
	  <?php get_sidebar(); ?>
	
<?php get_footer(); ?>