<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */ 
?>
<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
    <?php if ( has_post_thumbnail() ) { ?>
        <span class="blog-item__img">
            <?php the_post_thumbnail('blog-thumb'); ?>
        </span>
    <?php } ?>
    <span class="blog-item__content">
        <h2><?php the_title(); ?></h2>
        <?php the_excerpt(); ?>
        <span class="more-link">Подробнее</span>
    </span>
</a>