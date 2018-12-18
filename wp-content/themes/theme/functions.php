<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */

add_theme_support('title-tag');

register_nav_menus(array(
	'main-menu' => 'Верхнее',
	'top-menu' => 'Внизу'
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой

register_sidebar(array(
	'name' => 'Сайдбар',
	'id' => "sidebar",
	'description' => 'Обычная колонка в сайдбаре',
	'before_widget' => '<div id="%1$s" class="right-widget %2$s">',
	'after_widget' => "</div>\n",
	'before_title' => '<div class="wraptitle minus"><span class="widgettitle">',
	'after_title' => "</span></div>\n",
));

if (!function_exists('pagination')) {
	function pagination() { // функция вывода пагинации
		global $wp_query; // текущая выборка должна быть глобальной
		$big = 999999999; // число для замены
		$links = paginate_links(array( // вывод пагинации с опциями ниже
			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
			'format' => '?paged=%#%', // формат, %#% будет заменено
			'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
			'type' => 'array', // нам надо получить массив
			'prev_text'    => 'Назад', // текст назад
	    	'next_text'    => 'Вперед', // текст вперед
			'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
			'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
			'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
			'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
			'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
			'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
			'before_page_number' => '', // строка перед цифрой
			'after_page_number' => '' // строка после цифры
		));
	 	if( is_array( $links ) ) { // если пагинация есть
		    echo '<ul class="pagination">';
		    foreach ( $links as $link ) {
		    	if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>"; // если это активная страница
		        else echo "<li>$link</li>"; 
		    }
		   	echo '</ul>';
		 }
	}
}

add_action('wp_footer', 'add_scripts'); // приклеем ф-ю на добавление скриптов в футер
if (!function_exists('add_scripts')) {
	function add_scripts() {
	    if(is_admin()) return false;
	    wp_deregister_script('jquery');
	    wp_enqueue_script('jquery','//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','','',true);
	    wp_enqueue_script('maskedinput',get_template_directory_uri().'/js/jquery.maskedinput.min.js','','',true);
	    wp_enqueue_script('popper', get_template_directory_uri().'/plugins/umd/popper.min.js','','',true);
	    wp_enqueue_script('bootstrap', get_template_directory_uri().'/plugins/bootstrap-4.0.0/dist/js/bootstrap.min.js','','',true);
	    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js','','',true);
	    /* Include jQuery.mmenu.js files */
		wp_enqueue_script('mmenu', get_template_directory_uri().'/plugins/mmenu/js/jquery.mmenu.all.min.js');
	}
}

add_action('wp_print_styles', 'add_styles'); // приклеем ф-ю на добавление стилей в хедер
if (!function_exists('add_styles')) {
	function add_styles() {
	    if(is_admin()) return false;
	    wp_enqueue_style( 'bs', get_template_directory_uri().'/plugins/bootstrap-4.0.0/dist/css/bootstrap.min.css' );
		wp_enqueue_style( 'main', get_template_directory_uri().'/style.css' );
		wp_enqueue_style('mmenu', get_template_directory_uri().'/plugins/mmenu/css/jquery.mmenu.all.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
	}
}

/*------------функция для вывода класса в зависимости от существования виджетов в сайдбаре ----------------*/
if (!function_exists('content_class_by_sidebar')) {
	function content_class_by_sidebar() {
		if (is_active_sidebar( 'sidebar' ) && !wp_is_mobile() ) {
			echo 'col-lg-9 order-1 order-lg-2';
		} else {
			echo 'col-lg-12';
		}
	}
}
/*-------------PHP в сайтбаре----------------*/
function php_in_widgets($widget_content) {
	if (strpos($widget_content, '<' . '?') !== false) { 
		ob_start(); eval('?' . '>' . $widget_content);
		$widget_content = ob_get_contents();
		ob_end_clean();
	}
	return $widget_content;
}
add_filter('widget_text', 'php_in_widgets', 99);


/*-------------DELETE WIDGET TITLE----------------*/
add_filter( 'widget_title', 'hide_widget_title' );
function hide_widget_title( $title ) {
    if ( empty( $title ) ) return '';
    if ( $title[0] == '!' ) return '';
    return $title;
}

add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );

	function mycustom_wpcf7_form_elements( $form ) {
	$form = do_shortcode( $form );

	return $form;
}

?>
