<?php
/**
 * Шаблон сайдбара (sidebar.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
<?php if (is_active_sidebar( 'sidebar' )) { ?>
<aside class="col-lg-3 order-2 order-lg-1">
	<?php dynamic_sidebar('sidebar'); ?>
</aside>
<?php } ?>