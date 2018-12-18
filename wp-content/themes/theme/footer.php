<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
    <footer>
        <div class="top-footer">
            <div class="container">
                <h2 class="title mb-5">КОНТАКТЫ</h2>
                <div class="footer__contacts">
                    <div class="footer__item">
                        <div class="footer__contact-name">
                            ЭЛЕКТРОННАЯ ПОЧТА
                        </div>
                        <div class="footer__text">
                            info@site.ru
                        </div>
                    </div>
                    <div class="footer__item">
                        <div class="footer__contact-name">
                            АДРЕС ЦЕНТРА РИТУАЛЬНЫХ УСЛУГ
                        </div>
                        <div class="footer__text">
                            г.Красноярск, ул. Академика Ржанова 14
                        </div>
                    </div>
                    <div class="footer__item">
                        <div class="footer__contact-name">
                            ТЕЛЕФОН
                        </div>
                        <div class="footer__text">
                            +7 (111) 2-999-999
                        </div>
                    </div>
                </div>
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3fd96b38b047902d1fd2739e34b56ddb8b32462f17f2a7063322525bba31af65&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
        </div>
        <div class="footer-info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer__menu">
                            <?php wp_nav_menu(array( 'menu'=> 'footer-menu1')); ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer__menu">
                            <?php wp_nav_menu(array( 'menu'=> 'footer-menu2')); ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer__menu">
                            <div class="big">
                                <?php wp_nav_menu(array( 'menu'=> 'footer-menu3')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer__call">
                            <div class="footer__phone">+7 (111) 2-999-999</div>
                            <div class="footer__phone-text">звоните круглосуточно</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        Создание и продвижение сайта - <a href="http://minus-30.ru/" rel="nofollow">Minus30</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="top-head">
      <div class="container">
        <div class="row">
          <a id="hamburger" href="#phone-menu">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <nav id="phone-menu">
                <div class="grid">
                    <?php wp_nav_menu(array( 'menu'=> 'main-menu')); ?>
                    <hr>
                    <?php wp_nav_menu(array( 'menu'=> 'sidebar-menu')); ?>
                </div>
            </nav>
        </div>
      </div>
    </div>


<?php wp_footer(); ?>

<!-- MODAL -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="12" title="Модальное окно"]'); ?>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

</body>
</html>
