<?php get_header(); ?>

<div id="content-left">

<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			
			<div class="box-left clearfix">
				
				<?php if(get_post_meta($post->ID, "image_value", true)) : ?>
				    <img src="<?php bloginfo('template_url'); ?>/lib/thumb.php?src=<?php echo get_post_meta($post->ID, "image_value", true); ?>&amp;w=180&amp;h=180&amp;zc=1&amp;q=95" class="article-img-single" width="180" height="180" alt="<?php the_title(); ?>" />
				<?php else : ?>
				    <img src="<?php bloginfo('template_url'); ?>/img/default.jpg" class="article-img-single" alt="<?php the_title(); ?>" width="180" height="180"/>
				<?php endif; ?>
				
				<h2 class="article-title"><?php the_title(); ?></h2>
						
				<div class="article-meta"><?php the_date(); ?> <?php _e('em'); ?> <?php the_category(', '); ?></div>
		
				<div class="article-teaser"><?php $more = 0; the_content(''); ?></div>
			
				<?php after_more_content($post->post_content); ?>
				
				<?php the_tags('<p class="tags">'.__('Tags','destyle').': ', ', ', '</p>'); ?>
				
				<?php edit_post_link(__('Editar Artigo','destyle'), '<p>', '</p>'); ?>
			
			</div>
			
			<?php if(!get_option('destyle_auth_dsp')) : ?>
			<div class="box-left box-author clearfix">
		
				<?php echo get_avatar(get_the_author_email(), '100'); ?>
				
				<h3><?php the_author_posts_link(); ?></h3>
				
				<p><?php the_author_description(); ?></p>
			
			</div>
			<?php endif; ?>
			
			<?php comments_template('', true); ?>
		
		<?php endwhile; ?>
		
		<?php else : ?>
		
		<div class="box-left">

			<h2 class="article-title"><?php _e('Não Encontrado!','destyle'); ?></h2>
	    	<p><?php _e('Lamentamos, mas este artigo não existe ou foi movido.','destyle'); ?></p>
	    	<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		
		</div>

<?php endif; ?>
	
	  </div><!-- end content-left -->
	  
	  <?php get_sidebar(); ?>
	
<?php get_footer(); ?>