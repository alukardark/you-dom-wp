<?php
/**
 * template-ydom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package template-ydom
 */

if ( ! function_exists( 'template_ydom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function template_ydom_setup() {
		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on template-ydom, use a find and replace
         * to change 'template-ydom' to the name of your theme in all the template files.
         */
		load_theme_textdomain( 'template-ydom', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
		add_theme_support( 'title-tag' );

		/*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'template-ydom' ),
		) );

		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'template_ydom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'template_ydom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function template_ydom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'template_ydom_content_width', 640 );
}
add_action( 'after_setup_theme', 'template_ydom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function template_ydom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'template-ydom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'template-ydom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'template_ydom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function template_ydom_scripts() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/lib/bootstrap/bootstrap.css');
	wp_enqueue_style( 'bootstrap-theme.css', get_template_directory_uri().'/lib/bootstrap/bootstrap-theme.css');
	wp_enqueue_style( 'slick.css', get_template_directory_uri().'/lib/slick/slick.css');
	wp_enqueue_style( 'slick-theme.css', get_template_directory_uri().'/lib/slick/slick-theme.css');
	wp_enqueue_style( 'jquery-ui.css', get_template_directory_uri().'/lib/jquery-ui-1.12.1.custom/jquery-ui.css');
	wp_enqueue_style( 'multiple-select.css', get_template_directory_uri().'/lib/multiple-select/multiple-select.css');
	wp_enqueue_style( 'jquery.fancybox.min.css', get_template_directory_uri().'/lib/fancybox/jquery.fancybox.min.css');
	wp_enqueue_style( 'template-ydom-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery.min.js', get_template_directory_uri() . '/lib/jquery.js', '', '', false);
	wp_enqueue_script( 'page-scroll-to-id', get_template_directory_uri() . '/lib/page-scroll-to-id/jquery.PageScroll2id.min.js', '', '', false);
	wp_enqueue_script( 'bootstrap.min.js', get_template_directory_uri() . '/lib/bootstrap/bootstrap.min.js', '', '', true);
	wp_enqueue_script( 'slick.min.js', get_template_directory_uri() . '/lib/slick/slick.min.js', '', '', true);
	wp_enqueue_script( 'jquery.maskedinput.min.js', get_template_directory_uri() . '/lib/jquery.maskedinput.min.js', '', '', true);
	wp_enqueue_script( 'jquery-ui.min.js', get_template_directory_uri() . '/lib/jquery-ui.min.js', '', '', true);
	wp_enqueue_script( 'fixslider.min.js', get_template_directory_uri() . '/lib/fixslider.min.js', '', '', true);
	wp_enqueue_script( 'multiple-select.js', get_template_directory_uri() . '/lib/multiple-select/multiple-select.js', '', '', true);
	wp_enqueue_script( 'anime.min.js', get_template_directory_uri() . '/lib/BlockRevealers/js/anime.min.js', '', '', true);
	wp_enqueue_script( 'scrollMonitor.js', get_template_directory_uri() . '/lib/BlockRevealers/js/scrollMonitor.js', '', '', true);
	wp_enqueue_script( 'BlockRevealers-main', get_template_directory_uri() . '/lib/BlockRevealers/js/main.js', '', '', true);
	wp_enqueue_script( 'readmore.min.js', get_template_directory_uri() . '/lib/readmore.js/readmore.min.js', '', '', true);
	wp_enqueue_script( 'jquery.fancybox.min.js', get_template_directory_uri() . '/lib/fancybox/jquery.fancybox.min.js', '', '', true);
	wp_enqueue_script( 'js.cookie.js', get_template_directory_uri() . '/lib/js.cookie.js', '', '', true);
	wp_enqueue_script( 'api-maps', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;load=package.full', true);
	wp_enqueue_script( 'common.js', get_template_directory_uri() . '/js/common.js', '', '', true);




	wp_enqueue_script( 'template-ydom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'template-ydom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'template_ydom_scripts' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function template_ydom_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'template_ydom_pingback_header' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

	return $content;
});



$token = 'access-token=5zcPeqkbfxe7NzqKCRWVa2PAoSAv2grD';


function register_post_type_reviews() {
	$labels = array(
		'name' => 'Отзывы',
		'singular_name' => 'Отзывы', // админ панель Добавить->Функцию
		'add_new' => 'Добавить отзыв',
		'add_new_item' => 'Добавить новый отзыв',
		'edit_item' => 'Редактировать отзыв',
		'new_item' => 'Новый отзыв',
		'all_items' => 'Все отзывы',
		'view_item' => 'Просмотр отзывов',
		'search_items' => 'Искать отзыв',
		'not_found' =>  'Отзывов не найдено.',
		'not_found_in_trash' => 'В корзине нет отзывов.',
		'menu_name' => 'Отзывы' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true,
		//'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
		'menu_icon' => 'dashicons-welcome-write-blog', // иконка в меню
		'menu_position' => 30 // порядок в меню
		,'supports' => array('')
	);
	register_post_type('reviews', $args);
}

add_action( 'init', 'register_post_type_reviews' ); // Использовать функцию только внутри хука init

function register_post_type_settings() {
	$labels = array(
		'name' => 'Настройки темы',
		'singular_name' => 'Настройки темы', // админ панель Добавить->Функцию
		'add_new' => 'Добавить настройки',
		'add_new_item' => 'Добавить новые настройки',
		'edit_item' => 'Редактировать настройки',
		'new_item' => 'Новые настройки',
		'all_items' => 'Все настройки',
		'view_item' => 'Просмотр настроек',
		'search_items' => 'Искать настройки',
		'not_found' =>  'Настроек не найдено.',
		'not_found_in_trash' => 'В корзине нет настроек.',
		'menu_name' => 'Настройки темы' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true,
		//'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
		'menu_icon' => 'dashicons-welcome-widgets-menus', // иконка в меню
		'menu_position' => 29 // порядок в меню
	,'supports' => array( 'title' )
	);
	register_post_type('settings', $args);
}

add_action( 'init', 'register_post_type_settings' ); // Использовать функцию только внутри хука init

function register_post_type_why_choose() {
	$labels = array(
		'name' => 'Блоки - Почему наше агентсво?',
		'singular_name' => 'Блоки - Почему наше агентсво?', // админ панель Добавить->Функцию
		'add_new' => 'Добавить блок',
		'add_new_item' => 'Добавить новый блок',
		'edit_item' => 'Редактировать блок',
		'new_item' => 'Новый блок',
		'all_items' => 'Все блоки',
		'view_item' => 'Просмотр блоков',
		'search_items' => 'Искать блоки',
		'not_found' =>  'Блоков не найдено.',
		'not_found_in_trash' => 'В корзине нет блоков.',
		'menu_name' => 'Блоки - Почему наше агентсво?' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true,
		//'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
		'menu_icon' => 'dashicons-welcome-write-blog', // иконка в меню
		'menu_position' => 29 // порядок в меню
	,'supports' => array( 'title' )
	);
	register_post_type('why_choose', $args);
}

add_action( 'init', 'register_post_type_why_choose' ); // Использовать функцию только внутри хука init

function register_post_type_banks() {
	$labels = array(
		'name' => 'Банки',
		'singular_name' => 'Банки', // админ панель Добавить->Функцию
		'add_new' => 'Добавить банк',
		'add_new_item' => 'Добавить новый банк',
		'edit_item' => 'Редактировать банк',
		'new_item' => 'Новый банк',
		'all_items' => 'Все банки',
		'view_item' => 'Просмотр банка',
		'search_items' => 'Искать банк',
		'not_found' =>  'Банк не найден.',
		'not_found_in_trash' => 'В корзине нет банка.',
		'menu_name' => 'Банки' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true,
		//'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
		'menu_icon' => 'dashicons-welcome-write-blog', // иконка в меню
		'menu_position' => 29 // порядок в меню
	,'supports' => array( 'title' )
	);
	register_post_type('banks', $args);
}

add_action( 'init', 'register_post_type_banks' ); // Использовать функцию только внутри хука init

function format_phone($phone){
	$phone = sprintf("%s-%s-%s-%s",
		'8 ('.substr($phone, 0, 3).')',
		substr($phone, 3, 3),
		substr($phone, 6, 2),
		substr($phone, 8));
	return $phone;
}

function format_price($price, $currency){
	if($currency=='RUB'){
		$currency = "р.";
	}
	if( $price != 0 ){
		$price = number_format((int)$price, 0, ' ', ' ');
		return $price.' '.$currency;
	}

}

function types(){
	global $token;
	$url = "http://api.rent-scaner.ru/v2/real-estate/types?_format=xml&".$token;
	$res = simplexml_load_file($url);
	return $res;
}

function cities($cityId){
	global $token;
	$url = "http://api.rent-scaner.ru/v2/cities/".$cityId."?_format=xml&".$token;
	$res = simplexml_load_file($url);
	return $res;
}

function districts(){
	global $token;
	if($_POST['filter']['cityId']){
		$cityId = $_POST['filter']['cityId'];
	}else{
		//321-Новокузнецк
		$cityId = 321;
	}
	$url = "http://api.rent-scaner.ru/v2/cities/".$cityId."/districts?_format=xml&".$token;
	$res = simplexml_load_file($url);
	return $res;
}

function showTotalRes(){
	global $url;
	global $post;
	global $curl_str;

	$curl = curl_init($curl_str);
	curl_setopt($curl, CURLOPT_HEADER, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
	$data = curl_exec($curl);
	curl_close($curl);
	$pos = strpos($data, '<response>');
	$headers = mb_strcut($data, 0, $pos);
	$res = str_replace($headers, "", $data);
	$new_header_arr = explode("\n" ,$headers);

//	$oldheadersArr = get_headers($url);
	$oldheadersArr = $new_header_arr;
	foreach ($oldheadersArr as $headersItem){
		$headersItemId = explode(': ', $headersItem);
		$headerArr[$headersItemId[0]] = $headersItemId[1];
	}
	if($headerArr['X-Pagination-Total-Count']>0){
		echo "<div class='showTotalRes'>Всего найдено объектов: ".$headerArr['X-Pagination-Total-Count']."</div>";
	}else{
		echo "<div class='showTotalRes'>Объектов не найдено</div>";
	}

}

function showPagination($ajax=false){
	global $url;
	global $post;
	global $curl_str;






	//if ($ajax) $url .= '&page='.$_POST['PAGE_NUMBER'];

	if ($ajax){$curl_str .= '&page='.$_POST['PAGE_NUMBER'];}



	$curl = curl_init($curl_str);
	curl_setopt($curl, CURLOPT_HEADER, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
	$data = curl_exec($curl);
	curl_close($curl);
	$pos = strpos($data, '<response>');
	$headers = mb_strcut($data, 0, $pos);
	$res = str_replace($headers, "", $data);
	$new_header_arr = explode("\n" ,$headers);




//	$oldheadersArr = get_headers($url);
	$oldheadersArr = $new_header_arr;
	foreach ($oldheadersArr as $headersItem){
		$headersItemId = explode(': ', $headersItem);
		$headerArr[$headersItemId[0]] = $headersItemId[1];
	}

	if ($headerArr["X-Pagination-Page-Count"] > 1) {
		$show_page = array();
		$curr_page = $headerArr['X-Pagination-Current-Page'];
		$total_page = $headerArr["X-Pagination-Page-Count"];
		$after_page = $headerArr['X-Pagination-Current-Page']+1;
		$prev_page = $headerArr['X-Pagination-Current-Page']-1;
		$page = 1;
		echo "<ul class='my-pagination nostyle'>";
		if($curr_page!=1):
			echo "<li><a xpage='".$prev_page."' class='listpage pagination-prev' href='#'>$prev_page</a></li>";
		endif;
		if ($total_page > 10 ) {
			while ($page <= $total_page) {
				$show_page[$page] = 0;

				if ($page == $curr_page - 3 || $page == $curr_page + 3)
					$show_page[$page] = -1;
				if ($page == 1 || $page == $total_page)
					$show_page[$page] = 1;
				if ($page == $curr_page - 2 || $page == $curr_page - 1 || $page == $curr_page || $page == $curr_page +1 || $page == $curr_page + 2)
					$show_page[$page] = 1;

				$page++;
			}

			if ($curr_page == 1) {
				$show_page[4] = $show_page[5] = 1;
				$show_page[6] = -1;
			}

			if ($curr_page == 2) {
				$show_page[5] = 1;
				$show_page[6] = -1;
			}

			if ($curr_page == $total_page) {
				$show_page[$curr_page-3] = $show_page[$curr_page-4] = 1;
				$show_page[$curr_page-5] = -1;
			}

			if ($curr_page == $total_page - 1) {
				$show_page[$curr_page-3] =  1;
				$show_page[$curr_page-4] = -1;
			}

		}
		$page = 1;
		while ($page <= $total_page) {

			if ($total_page > 10 && $show_page[$page] == 0) {
				$page++;
				continue;
			}
			if ($total_page > 10 && $show_page[$page] == -1)
				echo '<li>...</li>';

			if ($total_page > 10 && $show_page[$page] == 1 || $total_page <= 10)	{
				if ($page == $curr_page)
					echo '<li><a href="#" class="active listpage" xpage="'.$page.'">'.$page.'</a></li>';
				else
					echo '<li><a href="#" class="listpage" xpage="'.$page.'">'.$page.'</a></li>';
			}
			$page++;
		}
		if($curr_page!=$total_page):
			echo "<li><a xpage='".$after_page."' class='listpage pagination-after' href='#'>$after_page</a></li>";
		endif;
		echo "</ul>";
		if($curr_page!=$total_page):
			echo '<button data-curpage="'.$curr_page.'" class="show-more"><span>+ Показать ещё</span></button>';
			echo '<button style="pointer-events: none; padding-top:7px; display:none" data-curpage="'.$curr_page.'" class="show-more show-more-loader"><span>
				<figure style="margin:0">
					<svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt">
					<rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect>
					<circle cx="50" cy="50" r="40" stroke="#fdba39" fill="none" stroke-width="10" stroke-linecap="round"></circle>
					<circle cx="50" cy="50" r="40" stroke="#ffffff" fill="none" stroke-width="10" stroke-linecap="round">
						<animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate>
						<animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate>
					</circle>
					</svg>
				</figure>
</span></button>';
		endif;



	}
//		echo "<pre><div class='col-md-6' style='text-align:right'>Показано ".(($headerArr['X-Pagination-Current-Page']-1)*$headerArr['X-Pagination-Per-Page']+1)."-".($headerArr['X-Pagination-Current-Page']*$headerArr['X-Pagination-Per-Page'])." из ".$headerArr['X-Pagination-Total-Count']."</div></pre>";
}

function get_result($ajax=false){
	global $token;
	global $url;
	global $post;
	global $curl_str;


	$settings_per_page = get_field('settings_per-page', 33);

	$settings_type = get_field('settings_type', 33);
	$settings_sources = get_field('settings_sources', 33);










	$_COOKIE['buyTypeId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyTypeId']);
	//$_COOKIE['buyRoomsId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyRoomsId']);
	$_COOKIE['buyDistrictId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buyDistrictId']);
	$_COOKIE['buysectionId'] = str_replace(array("[","]"), array("", ""), $_COOKIE['buysectionId']);

	//Игнорирование типов из админки
	$res = types();
	foreach ($res->item as $i):
		if(!in_array($i->id, $settings_type)){ continue; }
		$typeIdList .= '&typeId[]='.$i->id;
	endforeach;

	if($_POST['filter']['typeId']){
		$typeId = $_POST['filter']['typeId'];
		foreach ($typeId as $typeIdItem){
			$typeIdList .= '&typeId[]='.$typeIdItem;
		}
	}
	if($_COOKIE['buyTypeId']){
		$typeIdArr =  explode(',',$_COOKIE['buyTypeId']);
		$typeIdList = '';
		foreach ($typeIdArr as $typeIdItem){
			$typeIdList .= '&typeId[]='.$typeIdItem;
		}
	}
	foreach ($settings_sources as $settings_source){
		$sourceId .= '&sourceId[]='.$settings_source;
	}

	$priceFrom = "&priceFrom=".preg_replace("/[^0-9]/", '', $_POST['filter']['priceFrom']);
	$priceTo = "&priceTo=".preg_replace("/[^0-9]/", '', $_POST['filter']['priceTo']);
	if($_COOKIE['buyPriceFrom']) $priceFrom = "&priceFrom=".preg_replace("/[^0-9]/", '',$_COOKIE['buyPriceFrom']);
	if($_COOKIE['buyPriceTo']) $priceTo = "&priceTo=".preg_replace("/[^0-9]/", '', $_COOKIE['buyPriceTo']);
	if($priceFrom == "&priceFrom=0") $priceFrom = '';

	if($_POST['filter']['cityId']){
		$cityId = '&cityId='.$_POST['filter']['cityId'];
	}else{
		$cityId = '&cityId=321';
	}
	if($_COOKIE['cityId']){
		$cityId = '&cityId='.$_COOKIE['cityId'];
	}else{
		$cityId = '&cityId=321';
	}

	if($_POST['filter']['districts']){
		$districts = $_POST['filter']['districts'];
		foreach ($districts  as $districtsItem){
			$districtsList .= '&districtId[]='.$districtsItem;
		}
	}
	if($_COOKIE['buyDistrictId']){
		$districtsArr =  explode(',',$_COOKIE['buyDistrictId']);
		$districtsList = '';
		foreach ($districtsArr as $districtsIdItem){
			$districtsList .= '&districtId[]='.$districtsIdItem;
		}
	}

	if($_POST['filter']['sectionId']){
		$sectionId = '&sectionId='.$_POST['filter']['sectionId'][0];
	}else{
		$sectionId = '&sectionId=2';
	}
	if($_COOKIE['buysectionId']){
		$sectionId = '&sectionId='.$_COOKIE['buysectionId'];
	}elseif($_COOKIE['checkTabs']){
		$sectionId = '&sectionId='.$_COOKIE['checkTabs'];
	}

	if($_POST['filter']['address']){
		$address = '&address='.$_POST['filter']['address'];
	}
	if($_COOKIE['buyAddress']){
		$address = '&address='.$_COOKIE['buyAddress'];
	}

	if($_POST['filter']['description']){
		$description = '&description='.$_POST['filter']['description'];
	}
	if($_COOKIE['buyDescription']){
		$description = '&description='.$_COOKIE['buyDescription'];
	}

	if($_POST['filter']['withPhoto']){
		$withPhoto = '&withPhoto='.$_POST['filter']['withPhoto'];
	}
	if($_COOKIE['buywithPhoto']){
		$withPhoto = '&withPhoto='.$_COOKIE['buywithPhoto'];
	}

//	if($_POST['filter']['withRealtors']){
//		$withRealtors = '&withRealtors='.$_POST['filter']['withRealtors'];
//	}
//	if($_COOKIE['buywithRealtors']){
//		$withRealtors = '&withRealtors='.$_COOKIE['buywithRealtors'];
//	}

	$withRealtors = '&withRealtors=1';

	if($sectionId != '&sectionId=2' && $sectionId != '&sectionId=4'){
		$withRealtors = '&withRealtors=1';
	}

	if($sectionId != '&sectionId=2' && $sectionId != '&sectionId=4'){
		$settings_period = get_field('settings_period_arenda', 33);
	}else{
		$settings_period = get_field('settings_period_sale', 33);
	}

	if($_POST['filter']['page']){
		$page = '&page='.$_POST['filter']['page'];
	} elseif ($ajax == true) {
		$page = '&page='.$_POST['PAGE_NUMBER'];
	}


	$squareFrom = "&squareFrom=".$_POST['filter']['squareFrom'];
	if($_COOKIE['buySquareFrom']) $squareFrom = "&squareFrom=".$_COOKIE['buySquareFrom'];

	$squareTo = "&squareTo=".$_POST['filter']['squareTo'];
	if($_COOKIE['buySquareTo']) $squareTo = "&squareTo=".$_COOKIE['buySquareTo'];

	$floorFrom = "&floorFrom=".$_POST['filter']['floorFrom'];
	if($_COOKIE['buyFloorFrom']) $floorFrom = "&floorFrom=".$_COOKIE['buyFloorFrom'];

	$floorTo = "&floorTo=".$_POST['filter']['floorTo'];
	if($_COOKIE['buyFloorTo']) $floorTo = "&floorTo=".$_COOKIE['buyFloorTo'];

	$floorsFrom = "&floorsFrom=".$_POST['filter']['floorsFrom'];
	if($_COOKIE['buyFloorsFrom']) $floorsFrom = "&floorsFrom=".$_COOKIE['buyFloorsFrom'];

	$floorsTo = "&floorsTo=".$_POST['filter']['floorsTo'];
	if($_COOKIE['buyFloorsTo']) $floorsTo = "&floorsTo=".$_COOKIE['buyFloorsTo'];



	$roomsFrom = "&roomsFrom=".$_POST['filter']['roomsFrom'];
	if($_COOKIE['buyRoomsFrom']) $roomsFrom = "&roomsFrom=".$_COOKIE['buyRoomsFrom'];

	$roomsTo = "&roomsTo=".$_POST['filter']['roomsTo'];
	if($_COOKIE['buyRoomsTo']) $roomsTo = "&roomsTo=".$_COOKIE['buyRoomsTo'];

	// $roomsFrom = "&roomsFrom=".$_POST['filter']['rooms'][0];
	// if($roomsFrom == "&roomsFrom=5") $roomsTo = "";
	// else $roomsTo = "&roomsTo=".$_POST['filter']['rooms'][0];
	// $roomsFrom = "&roomsFrom=".$_COOKIE['buyRoomsId'];
	// if($roomsFrom == "&roomsFrom=5") $roomsTo = "";
	// else $roomsTo = "&roomsTo=".$_COOKIE['buyRoomsId'];





	$url = "http://api.rent-scaner.ru/v2/real-estate?_format=xml&expand=sourcesId,sectionId,longitude,latitude,isRealtor&".$token.
		$cityId.
		//'&sourceId[]=16&sourceId[]=41&sourceId[]=45&sourceId[]=52&sourceId[]=58&sourceId[]=217&sourceId[]=221'.
		//"&period=1".
		$sourceId.
		"&period=$settings_period".
		"&per-page=$settings_per_page".
		$typeIdList.
		//"&typeId[]=1&typeId[]=2&typeId[]=3&typeId[]=4&typeId[]=7".
		$roomsFrom.
		$roomsTo.
		$priceFrom.
		$priceTo.
		$districtsList.
		$sectionId.
		$address.
		$description.
		$withPhoto.
		$withRealtors.
		$squareFrom.
		$squareTo.
		$floorFrom.
		$floorTo.
		$floorsFrom.
		$floorsTo.
		$page
	;
//	if ($ajax == 'AJAX') {
//		return $url;
//	}










	$post = $sourceId.
			"&period=$settings_period".
			$typeIdList.
			$roomsFrom.
			$roomsTo.
			$priceFrom.
			$priceTo.
			$districtsList.
			$sectionId.
			$address.
			$description.
			$withPhoto.
			$withRealtors.
			$squareFrom.
			$squareTo.
			$floorFrom.
			$floorTo.
			$floorsFrom.
			$floorsTo;
	$curl_str = "http://api.rent-scaner.ru/v2/real-estate?_format=xml&expand=sourcesId,sectionId,longitude,latitude,isRealtor&".$token.$cityId."&per-page=$settings_per_page".$page;
	$curl = curl_init("http://api.rent-scaner.ru/v2/real-estate?_format=xml&expand=sourcesId,sectionId,longitude,latitude,isRealtor&".$token.$cityId."&per-page=$settings_per_page".$page);

	if($_POST['filter']['reset']){
		$post = $typeIdList.
			$sourceId.
			"&period=$settings_period".
			$sectionId.
			$withRealtors
		;
		$curl_str = "http://api.rent-scaner.ru/v2/real-estate?_format=xml&expand=sourcesId,sectionId,longitude,latitude,isRealtor&".$token.$cityId."&per-page=$settings_per_page";
		$curl = curl_init("http://api.rent-scaner.ru/v2/real-estate?_format=xml&expand=sourcesId,sectionId,longitude,latitude,isRealtor&".$token.$cityId."&per-page=$settings_per_page");
	}

	curl_setopt($curl, CURLOPT_HEADER, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
	$data = curl_exec($curl);
	curl_close($curl);
	$pos = strpos($data, '<response>');
	$headers = mb_strcut($data, 0, $pos);
	$res = str_replace($headers, "", $data);
	$new_header_arr = explode("\n" ,$headers);


	$res = simplexml_load_string($res);
	return $res;
}

function parseDataItems($dataItems){
	print_r(json_encode($dataItems));
}

require get_template_directory() . "/ajax-load.php";


function IE(){
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	if (stripos($user_agent, 'MSIE 6.0') !== false) {
		header("Location: /ie67/ie6.html");
		exit;
	}
	if (stripos($user_agent, 'MSIE 7.0') !== false) {
		header("Location: /ie67/ie7.html");
		exit;
	}
	if (stripos($user_agent, 'MSIE 8.0') !== false) {
		header("Location: /ie67/ie8.html");
		exit;
	}
	if (stripos($user_agent, 'MSIE 9.0') !== false) {
		header("Location: /ie67/ie9.html");
		exit;
	}
}
IE();

function send_sms($admin_phone, $text) {
	require_once 'SMS/transport.php';

	$params  = array(
		"action"       => "send", //send or check
		"onlydelivery" => 1,
		"text"         => trim($text)
	);

	$api = new Transport();
	$send = $api->send($params, array($admin_phone));
	return $send['code'] == 1;
}

add_action( 'wpcf7_mail_sent', 'wpcf7_get_unisender' );

function wpcf7_get_unisender( $contact_form ) {
	$title = $contact_form->title;

	$admin_phone = $contact_form->additional_setting('admin_phone');

	if ( 'Заказать звонок' == $title ) {

		$submission = WPCF7_Submission::get_instance();
		$posted_data = & $submission->get_posted_data();

		$text = "Заявка на звонок: ".$posted_data['your-name'].' '.$posted_data['phone'];

		send_sms($admin_phone[0], $text);


		//$text_user = "Вам скоро перезвонят!";
		//send_sms($posted_data['phone'], $text_user);
	}

    //$text.=" -кому:-".$admin_phone[0];
    //$logsms ="log.txt";
    //file_put_contents($logsms, $text . "\n", FILE_APPEND);

	//$text_user.=" -кому:-".$posted_data['phone'];
	//$logsms ="log.txt";
	//file_put_contents($logsms, $text_user . "\n", FILE_APPEND);
}

add_action('wp_enqueue_scripts', 'AjaxData', 99);
function AjaxData() {

if (!is_super_admin()) $admin_phone = get_field('settings_phone', 33);

	wp_localize_script('common.js', 'ajaxData',
		array(
			'$admin_phone' => $admin_phone
		)
	);
}
