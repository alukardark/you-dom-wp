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

	wp_enqueue_script( 'jquery.min.js', get_template_directory_uri() . '/lib/jquery.js', '', '', true);
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
	wp_enqueue_script( 'api-maps', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', true);
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


$token = 'access-token=5zcPeqkbfxe7NzqKCRWVa2PAoSAv2grD';




function format_phone($phone){
	$phone = sprintf("%s-%s-%s-%s",
		'8 ('.substr($phone, 0, 3).')',
		substr($phone, 3, 3),
		substr($phone, 6, 2),
		substr($phone, 8));
	return $phone;
}

function format_price($price, $currency){
	if( $price != 0 ){
		$price = number_format((int)$price, 0, ' ', ' ');
	}
	if($currency=='RUB'){
		$currency = "р.";
	}
	return $price.' '.$currency;
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

function showPagination($ajax=false){
	global $url;
	if ($ajax) $url .= '&page='.$_POST['PAGE_NUMBER'];
	print_r($url);
	$oldheadersArr = get_headers($url);
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
		echo '<button data-curpage="'.$curr_page.'" class="show-more">+ Показать ещё</button>';


	}
//		echo "<pre><div class='col-md-6' style='text-align:right'>Показано ".(($headerArr['X-Pagination-Current-Page']-1)*$headerArr['X-Pagination-Per-Page']+1)."-".($headerArr['X-Pagination-Current-Page']*$headerArr['X-Pagination-Per-Page'])." из ".$headerArr['X-Pagination-Total-Count']."</div></pre>";
}

function get_result($ajax=false){
	global $token;
	global $url;

	if($_POST['filter']['typeId']){
		$typeId = $_POST['filter']['typeId'];
		foreach ($typeId as $typeIdItem){
			$typeIdList .= '&typeId[]='.$typeIdItem;
		}
	}

	$priceFrom = preg_replace("/[^0-9]/", '', $_POST['filter']['priceFrom']);
	$priceTo = preg_replace("/[^0-9]/", '', $_POST['filter']['priceTo']);
	if($priceFrom == 0) $priceFrom = '';

	if($_POST['filter']['cityId']){
		$cityId = '&cityId='.$_POST['filter']['cityId'];
	}else{
		//321-Новокузнецк
		$cityId = '&cityId=321';
	}
	if($_POST['filter']['districts']){
		$districts = $_POST['filter']['districts'];
		foreach ($districts  as $districtsItem){
			$districtsList .= '&districtId[]='.$districtsItem;
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
	if($_POST['filter']['description']){
		$description = '&description='.$_POST['filter']['description'];
	}
	if($_POST['filter']['withPhoto']){
		$withPhoto = '&withPhoto='.$_POST['filter']['withPhoto'];
	}
	if($_POST['filter']['page']){
		$page = '&page='.$_POST['filter']['page'];
	} elseif ($_POST['filter']['page'] && $ajax == true) {
		$page = '&page='.$_POST['PAGE_NUMBER'];
	}


	$squareFrom = "&squareFrom=".$_POST['filter']['squareFrom'];
	$squareTo = "&squareTo=".$_POST['filter']['squareTo'];;
	$floorFrom = "&floorFrom=".$_POST['filter']['floorFrom'];
	$floorTo = "&floorTo=".$_POST['filter']['floorTo'];;
	$floorsFrom = "&floorsFrom=".$_POST['filter']['floorsFrom'];
	$floorsTo = "&floorsTo=".$_POST['filter']['floorsTo'];;


	$url = "http://api.rent-scaner.ru/v2/real-estate?_format=xml&".$token.
		$cityId.
		//"&period=1".
		"&period=45".
		"&per-page=20".
		$typeIdList.
		"&priceFrom=".$priceFrom.
		"&priceTo=".$priceTo.
		$districtsList.
		$sectionId.
		$address.
		$description.
		$withPhoto.
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




	if($_POST['filter']['reset']){
		$url = "http://api.rent-scaner.ru/v2/real-estate?_format=xml&".$token.
			$cityId.
			$sectionId
		;
	}


	$res = simplexml_load_file($url);

//	echo json_encode($url);
	return $res;
//	wp_die();
}
require get_template_directory() . "/ajax-load.php";
