<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); ?> 
<section class="content">
	<div class="container">
		<div class="row">
			<?php get_sidebar(); ?>
			<div class="<?php content_class_by_sidebar(); ?>">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					}
				?>
				<h1><?php single_cat_title(); ?></h1>
                <div class="row">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="col-lg-6 mb-5">
                        <?php get_template_part('loop'); ?>
                    </div>
                    <?php endwhile;
                    else: echo '<div class="col-12"><p>Нет записей.</p></div>'; endif; ?>
                </div>
				<?php pagination(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>