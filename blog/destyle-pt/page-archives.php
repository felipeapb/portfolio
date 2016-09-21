<?php /*
Template Name: Archives
*/ ?>

<?php get_header(); ?>

<div id="content-left">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
			<h2 class="article-title"><?php the_title(); ?></h2>
			
			<?php if(get_the_content()) :  ?>
			<div class="box-left">
			
				<?php the_content(); ?>
				
				<?php edit_post_link(__('Editar Página','destyle'), '<p>', '</p>'); ?>
			
			</div>
			<?php endif; ?>
				
			<?php include (TEMPLATEPATH . "/archives.php"); ?>
		
		<?php endwhile; endif; ?>
	
</div><!-- end content-left -->

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>