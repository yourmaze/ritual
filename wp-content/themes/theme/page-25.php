<?php
/**
 * Шаблон страницы похорон(page-25.php)
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
                            Организация похорон
                            в Красноярске
                        </h1>
                        <div class="hero__text">
                            Ответим на вопросы, позвоним в нужные инстанции и проведем похороны полностью под ключ. Вам не придется переживать за организацию.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pricetab second-price">
        <div class="container">
            <h2 class="title mb-2">ОРГАНИЗУЕМ ДОСТОЙНЫЕ ПОХОРОНЫ</h2>
            <div class="sub-h2 mb-5">БЕЗ ОБМАНА И ПРОВОЛОЧЕК</div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#pohorony" aria-selected="true">
                                <img src="<?php bloginfo('template_url'); ?>/images/pohorony/agent_norm.png" alt="">
                                КАК РАБОТАЕМ МЫ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#krematsia" aria-selected="false">
                                <img src="<?php bloginfo('template_url'); ?>/images/pohorony/agent_black.png" alt="">
                                КАК РАБОТАЮТ
                                ЧЕРНЫЕ АГЕНТЫ
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pohorony">
                            <div class="second-price__wrap">
                                <div class="second-price__item">
                                    <div class="second-price__img">
                                        <img src="<?php bloginfo('template_url'); ?>/images/pohorony/24_7.png" alt="">
                                    </div>
                                    <div class="second-price__name">
                                        Телефонная консультация
                                    </div>
                                    <div class="second-price__text">
                                        Бесплатно ответим на все возникшие вопросы и расскажем, как действовать
                                        в сложившейся ситуации.
                                    </div>
                                </div>
                                <div class="second-price__item">
                                    <div class="second-price__img">
                                        <img src="<?php bloginfo('template_url'); ?>/images/pohorony/document.png" alt="">
                                    </div>
                                    <div class="second-price__name">
                                        Оформление документов
                                    </div>
                                    <div class="second-price__text">
                                        Сотрудник "Название" вместе с родственниками встречают экстренные службы и помогает заполнить документы
                                    </div>
                                </div>
                                <div class="second-price__item">
                                    <div class="second-price__img">
                                        <img src="<?php bloginfo('template_url'); ?>/images/pohorony/ritual_veshi.png" alt="">
                                    </div>
                                    <div class="second-price__name">
                                        Ритуальные принадлежности
                                    </div>
                                    <div class="second-price__text">
                                        Вы выбираете необходимые товары и услуги без скрытых платежей, наценок и навязывания. Вы получаете информацию по льготам
                                        и компенсациям
                                    </div>
                                </div>
                                <div class="second-price__item">
                                    <div class="second-price__img">
                                        <img src="<?php bloginfo('template_url'); ?>/images/pohorony/pod_kluch.png" alt="">
                                    </div>
                                    <div class="second-price__name">
                                        Полное сопровождение
                                    </div>
                                    <div class="second-price__text">
                                        Ритуальный агент сопровождает вас на всех этапах похорон и следит за исполнением обязательств
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="krematsia">
                            <div class="second-price__wrap">
                                <div class="second-price__item">
                                    <div class="second-price__img">
                                        <img src="<?php bloginfo('template_url'); ?>/images/pohorony/money.png" alt="">
                                    </div>
                                    <div class="second-price__name">
                                        Продажа и информации
                                    </div>
                                    <div class="second-price__text">
                                        Продажа информации о смерти черным агентам до 10.000 рублей. Расходы на покупку информации включается в ваш чек.
                                    </div>
                                </div>
                                <div class="second-price__item">
                                    <div class="second-price__img">
                                        <img src="<?php bloginfo('template_url'); ?>/images/pohorony/massony.png" alt="">
                                    </div>
                                    <div class="second-price__name">
                                        Навязчивость
                                    </div>
                                    <div class="second-price__text">
                                        Черные агенты без приглашения появляются у ваших дверей. Бесконечно звонят по телефону
                                    </div>
                                </div>
                                <div class="second-price__item">
                                    <div class="second-price__img">
                                        <img src="<?php bloginfo('template_url'); ?>/images/pohorony/obman.png" alt="">
                                    </div>
                                    <div class="second-price__name">
                                        Обман
                                    </div>
                                    <div class="second-price__text">
                                        - Навязывание услуг<br>
                                        - Завышение реальной стоимости услуг<br>
                                        - Отсутствие договоров<br>
                                        - Неисполнение обязательств
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stoimost">
        <div class="container">
            <h2 class="title mb-4">СТОИМОСТЬ ПОХОРОН</h2>
            <label class="checkbox">
                <input type="checkbox" name="stoimost_posobie" />
                <div class="checkbox__text">Показывать цены с учетом предоставления <a href="#">социального пособия на погребение</a></div>
            </label>
            <div class="stoimost__wrap">
                <div class="stoimost__item">
                    <div class="stoimost__name">БАЗОВЫЙ</div>
                    <div class="stoimost__price"><span class="price_value" data-price="8500">8.500</span> Р</div>
                    <ul class="stoimost__list">
                        <li>Гроб, обитый ситцем</li>
                        <li>Крест на могилу</li>
                        <li>Табличка на крест</li>
                        <li>Изготовление могилы</li>
                        <li>Погребение</li>
                        <li>Транспортировка на кладбище</li>
                        <li>Бригада выносная и закопочная</li>
                        <li>Доставка гроба</li>
                        <li>Набор погребальный</li>
                        <li>Документы</li>
                    </ul>
                </div>
                <div class="stoimost__item">
                    <div class="stoimost__name">ОПТИМАЛЬНЫЙ</div>
                    <div class="stoimost__price"><span class="price_value" data-price="13000">13.000</span> Р</div>
                    <ul class="stoimost__list">
                        <li>Гроб  (бархат)</li>
                        <li>Крест</li>
                        <li>Табличка</li>
                        <li>Могила</li>
                        <li>Катафалк  (Хайс)</li>
                        <li>Бригада</li>
                        <li>Погребение</li>
                        <li>Установка креста и таблички</li>
                        <li>Храм</li>
                        <li>Занос и вынос в храм из храма</li>
                        <li>Пронос до могилы</li>
                        <li>Поиск мест захоронения</li>
                        <li>Доставка пустого гроба</li>
                        <li>Вынос из морга</li>
                        <li>Документы</li>
                    </ul>
                </div>
                <div class="stoimost__item">
                    <div class="stoimost__name">ОСОБЫЙ</div>
                    <div class="stoimost__price"><span class="price_value" data-price="41000">41.000</span> Р</div>
                    <ul class="stoimost__list">
                        <li>Гроб лакированный</li>
                        <li>Крест</li>
                        <li>Табличка</li>
                        <li>Могила</li>
                        <li>Катафалк (Мерседес)</li>
                        <li>Бригада</li>
                        <li>Погребение</li>
                        <li>Установка креста и таблички</li>
                        <li>Зал прощания</li>
                        <li>Занос и вынос в зал из зала</li>
                        <li>Пронос до могилы</li>
                        <li>Поиск мест захоронения</li>
                        <li>Доставка пустого гроба</li>
                        <li>Вынос из морга</li>
                        <li>Документы</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="callagent">
        <div class="container">
            <div class="callagent__wrap">
                <div class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-info="Вызвать ритуального агента">Вызвать ритуального агента</div>
            </div>
        </div>
    </section>

    <div class="reviews">
        <div class="container">
            <h2 class="title mb-5">ОТЗЫВЫ</h2>
            <?php echo do_shortcode('[supercarousel id=65]'); ?>
        </div>
    </div>

<?php get_footer(); ?>