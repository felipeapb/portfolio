<?php get_header(); ?>

<div id="content-left">

<?php if (have_posts()) : ?>

		<?php // Get number of search results
			$results = new WP_Query("s=$s&showposts=-1"); 
			$term = wp_specialchars($s, 1); 
			$number = $results->post_count;
			wp_reset_query(); 
		?>

		<h1 class="category-title"><?php echo $number; ?> <?php _e('resultados da pesquisa para','destyle'); ?> "<?php echo $term; ?>"</h1>

		<?php while (have_posts()) : the_post(); ?>
			
			<div class="box-left clearfix">
				
				<h2 class="article-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						
				<div class="article-meta"><?php the_time(get_option('date_format')); ?> <?php _e('em','destyle'); ?> <?php the_category(', '); ?></div>
		
				<?php the_content(__('Ler mais...','destyle')); ?>
				
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

			<h2 class="article-title">Não Encontrado!</h2>
			<p><?php _e('Lamentamos, mas não encontramos resultados para a sua pesquisa.<br />Tente novamente, mas utilize outras palavras.','destyle'); ?></p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		
		</div>

<?php endif; ?>
	
	  </div><!-- end content-left -->
	  
	  <?php get_sidebar(); ?>
	
<?php get_footer(); ?>