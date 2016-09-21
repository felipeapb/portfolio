<?php get_header(); ?>
<div class="span-24" id="contentwrap">
	<div class="span-16">
		<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Resultados da Pesquisa</h2>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h2 class="title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="postdate">Publicado por <strong><?php the_author() ?></strong> em <?php the_time('d/m/Y') ?> <?php if (current_user_can('edit_post', $post->ID)) { ?> | <?php edit_post_link('Editar', '', ''); } ?></div>

				<div class="entry">
                    <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array(200,160), array("class" => "alignleft post_thumbnail")); } ?>
					<?php the_excerpt() ?>
                    <div class="readmorecontent">
						<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">Ler Mais &raquo;</a>
					</div>
				</div>

        	</div>

		<?php endwhile; ?>

		<div class="navigation">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
			<div class="alignleft"><?php next_posts_link('&laquo; Artigos Anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Artigos Recentes &raquo;') ?></div>
			<?php } ?>
		</div>

	<?php else : ?>

		<h2 class="pagetitle">Lamentamos, mas não foram encontrados resultados para a sua pesquisa</h2>
	<?php endif; ?>

		</div>
	</div>

<?php get_sidebars(); ?>
</div>
<?php get_footer(); ?>