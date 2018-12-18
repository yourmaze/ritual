<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); ?>

<section class="hero">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="hero__overlay">
					<h1>
						Ритуальные услуги
						в Красноярске
					</h1>
					<div class="hero__text">
						Ответим на вопросы, позвоним в нужные инстанции
						и расскажем, как вести себя в данной ситуации
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="uslugi">
    <div class="container">
        <h2 class="title mb-5">НАШИ УСЛУГИ</h2>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <a href="#" class="uslugi__item">
                    <div class="uslugi__icon">
                        <img src="<?php bloginfo('template_url'); ?>/images/icon-1.png" alt="">
                    </div>
                    <div class="uslugi__title">
                        ОРГАНИЗАЦИЯ
                        ПОХОРОН
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mb-4">
                <a href="#" class="uslugi__item">
                    <div class="uslugi__icon">
                        <img src="<?php bloginfo('template_url'); ?>/images/icon-2.png" alt="">
                    </div>
                    <div class="uslugi__title">
                        КРЕМАЦИЯ
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mb-4">
                <a href="#" class="uslugi__item">
                    <div class="uslugi__icon">
                        <img src="<?php bloginfo('template_url'); ?>/images/icon-3.png" alt="">
                    </div>
                    <div class="uslugi__title">
                        АРЕНДА
                        КАТАФАЛКА
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mb-4">
                <a href="#" class="uslugi__item">
                    <div class="uslugi__icon">
                        <img src="<?php bloginfo('template_url'); ?>/images/icon-4.png" alt="">
                    </div>
                    <div class="uslugi__title">
                        ЗАЛ ПРОЩАНИЯ
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mb-4">
                <a href="#" class="uslugi__item">
                    <div class="uslugi__icon">
                        <img src="<?php bloginfo('template_url'); ?>/images/icon-5.png" alt="">
                    </div>
                    <div class="uslugi__title">
                        БЛАГОУСТРОЙСТВО
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mb-4">
                <a href="#" class="uslugi__item">
                    <div class="uslugi__icon">
                        <img src="<?php bloginfo('template_url'); ?>/images/icon-6.png" alt="">
                    </div>
                    <div class="uslugi__title">
                        ГРУЗ 200
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="pricetab">
    <div class="container">
        <h2 class="title mb-5">СТОИМОСТЬ УСЛУГ</h2>
        <div class="row">
            <div class="col-lg-7">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#pohorony" aria-selected="true">
                            <img src="<?php bloginfo('template_url'); ?>/images/pohorony-mini.png" alt="">
                            Похороны
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#krematsia" aria-selected="false">
                            <img src="<?php bloginfo('template_url'); ?>/images/krematcia-mini.png" alt="">
                            Кремация
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pohorony">
                        <div class="tab-content__list">
                            <div class="tab-content__wrap">
                                <div class="tab-content__name">БАЗОВЫЙ</div>
                                <div class="tab-content__text">Минимальный набор товаров и услуг для похорон</div>
                            </div>
                            <div class="tab-content__price">
                                <span>5 438</span> руб
                            </div>
                        </div>
                        <div class="tab-content__list">
                            <div class="tab-content__wrap">
                                <div class="tab-content__name">ОПТИМАЛЬНЫЙ</div>
                                <div class="tab-content__text">Все нужные процедуры, товары и услуги для похорон</div>
                            </div>
                            <div class="tab-content__price">
                                <span>19 338</span> руб
                            </div>
                        </div>
                        <div class="tab-content__list">
                            <div class="tab-content__wrap">
                                <div class="tab-content__name">ОСОБЫЙ</div>
                                <div class="tab-content__text">Vip похороны для особенных усопших</div>
                            </div>
                            <div class="tab-content__price">
                                <span>41 088</span> руб
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="krematsia">
                        <div class="tab-content__list">
                            <div class="tab-content__wrap">
                                <div class="tab-content__name">БАЗОВЫЙ</div>
                                <div class="tab-content__text">Минимальный набор товаров и услуг для похорон</div>
                            </div>
                            <div class="tab-content__price">
                                <span>5 438</span> руб
                            </div>
                        </div>
                        <div class="tab-content__list">
                            <div class="tab-content__wrap">
                                <div class="tab-content__name">ОПТИМАЛЬНЫЙ</div>
                                <div class="tab-content__text">Все нужные процедуры, товары и услуги для похорон</div>
                            </div>
                            <div class="tab-content__price">
                                <span>19 338</span> руб
                            </div>
                        </div>
                        <div class="tab-content__list">
                            <div class="tab-content__wrap">
                                <div class="tab-content__name">ОСОБЫЙ</div>
                                <div class="tab-content__text">Vip похороны для особенных усопших</div>
                            </div>
                            <div class="tab-content__price">
                                <span>41 088</span> руб
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="pricetab__statiy">
                    <a href="#" class="pricetab__statiy-item">
                        <div class="pricetab__statiy-icon">
                            <img src="<?php bloginfo('template_url'); ?>/images/icon2-1.png" alt="">
                        </div>
                        <div class="pricetab__statiy-name">
                            РИТУАЛЬНЫЙ<br>
                            АГЕНТ
                        </div>
                    </a>
                    <a href="#" class="pricetab__statiy-item">
                        <div class="pricetab__statiy-icon">
                            <img src="<?php bloginfo('template_url'); ?>/images/icon2-2.png" alt="">
                        </div>
                        <div class="pricetab__statiy-name">
                            РИТУАЛЬНЫЕ<br>
                            ТОВАРЫ
                        </div>
                    </a>
                    <a href="#" class="pricetab__statiy-item">
                        <div class="pricetab__statiy-icon">
                            <img src="<?php bloginfo('template_url'); ?>/images/icon2-3.png" alt="">
                        </div>
                        <div class="pricetab__statiy-name">
                            ПОСОБИЕ<br>
                            НА ПОГРЕБЕНИЕ
                        </div>
                    </a>
                    <a href="#" class="pricetab__statiy-item">
                        <div class="pricetab__statiy-icon">
                            <img src="<?php bloginfo('template_url'); ?>/images/icon2-4.png" alt="">
                        </div>
                        <div class="pricetab__statiy-name">
                            ПРИЖИЗНЕННЫЙ<br>
                            ДОГОВОР
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="question">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2>У вас есть вопросы?</h2>
                <p>Позвоните на номер +7 (111) 299-99-99 или <span>оставьте заявку</span> на обратный звонок и мы абсолютно бесплатно ответим на все ваши вопросы. Это намного быстрее, чем искать информацию самостоятельно</p>
            </div>
        </div>
    </div>
</section>

<div class="reviews">
    <div class="container">
        <h2 class="title mb-5">ОТЗЫВЫ</h2>
        <?php echo do_shortcode('[supercarousel id=65]'); ?>
    </div>
</div>


    <section class="last-news">
        <div class="container">
            <h2 class="title mb-5">ПОЛЕЗНЫЕ СТАТЬИ</h2>
            <div class="row">
                <?php
                $args = array(
                    'numberposts' => 3,
                    'category'    => 3,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );

                $posts = get_posts( $args );

                foreach($posts as $post){ setup_postdata($post); ?>
                    <article <?php post_class("col-lg-4 col-md-6"); ?>>
                        <div class="blog-post">
                            <div class="post-content">
                                <div class="post-header">
                                    <?php the_post_thumbnail('blog-thumb'); ?>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php }

                wp_reset_postdata(); // сброс
                ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>