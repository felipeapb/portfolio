<?php get_header(); ?>

<div id="content-left">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			
			<div class="box-left clearfix">
				
				<?php if(get_post_meta($post->ID, "image_value", true)) : ?>
				    <img src="<?php bloginfo('template_url'); ?>/lib/thumb.php?src=<?php echo get_post_meta($post->ID, "image_value", true); ?>&amp;w=180&amp;h=180&amp;zc=1&amp;q=95" class="article-img-single" width="180" height="180" alt="<?php the_title(); ?>" />
				<?php endif; ?>
				
				<h2 class="article-title"><?php the_title(); ?></h2>
		
				<?php the_content(); ?>
				
				<?php edit_post_link(__('Editar Página','destyle'), '<p>', '</p>'); ?>
			
			</div>
			
			<?php if(!get_option('destyle_comments_dsp')) comments_template('', true); ?>
		
		<?php endwhile; else : ?>
		
		<div class="box-left">

			<h2 class="article-title">Não Encontrado!</h2>
			<p><?php _e('Lamentamos, mas a página que procura não foi encontrada.','destyle'); ?></p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		
		</div>

	<?php endif; ?>
	
</div><!-- end content-left -->

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>