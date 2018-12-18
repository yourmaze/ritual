<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php /* RSS и всякое */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
        <div class="header__top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__phone">
                            +7 (111) 2-999-999
                        </div>
                        <div class="header__text">Звоните круглосуточно</div>
                    </div>
                    <div class="col-lg-3">
                        <div class="header__address">
                            г. Красноярск<br>
                            ул. Академика Ржанова, 14
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-menu">
            <div class="container">
                <?php wp_nav_menu(array( 'menu'=> 'main-menu')); ?>
            </div>
        </div>
	</header>

