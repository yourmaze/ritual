<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: Страница с боковым сайдбаром
 */
get_header(); ?>
<section>
	<div class="container">
		<div class="row">
			<?php get_sidebar(); ?>
			<div class="<?php content_class_by_sidebar(); ?>">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					}
				?>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
						<?php
						if( comments_open($post->ID) ){
							comments_template();
						}
						 ?>
					</article>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>