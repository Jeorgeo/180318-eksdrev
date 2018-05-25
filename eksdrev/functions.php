<?php
/**
 * eksdrev functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eksdrev
 */

if ( ! function_exists( 'eksdrev_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function eksdrev_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on eksdrev, use a find and replace
		 * to change 'eksdrev' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'eksdrev', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'eksdrev' ),
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
		add_theme_support( 'custom-background', apply_filters( 'eksdrev_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'eksdrev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eksdrev_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'eksdrev_content_width', 640 );
}
add_action( 'after_setup_theme', 'eksdrev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eksdrev_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'eksdrev' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'eksdrev' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Контакты - Velcom', 'eksdrev' ),
		'id'            => 'contacts-vel',
		'description'   => esc_html__( 'Добавьте ссылку сюда.', 'eksdrev' ),
		'before_widget' => '<span class="contact-box velcom">',
		'after_widget'  => '</span>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Контакты - Mтс', 'eksdrev' ),
		'id'            => 'contacts-mts',
		'description'   => esc_html__( 'Добавьте ссылку сюда.', 'eksdrev' ),
		'before_widget' => '<span class="contact-box mts">',
		'after_widget'  => '</span>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Контакты - почта', 'eksdrev' ),
		'id'            => 'contacts-mail',
		'description'   => esc_html__( 'Добавьте ссылку сюда.', 'eksdrev' ),
		'before_widget' => '<span class="contact-box email">',
		'after_widget'  => '</span>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Контакты - адрес', 'eksdrev' ),
		'id'            => 'contacts-adress',
		'description'   => esc_html__( 'Добавьте текст сюда.', 'eksdrev' ),
		'before_widget' => '<div class="widget__footer-contacts">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Соц.сети - ВК', 'eksdrev' ),
		'id'            => 'social-vk',
		'description'   => esc_html__( 'Добавьте ссылку сюда.', 'eksdrev' ),
		'before_widget' => '<div class="social-icons social_vk">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Соц.сети - ОК', 'eksdrev' ),
		'id'            => 'social-ok',
		'description'   => esc_html__( 'Добавьте ссылку сюда.', 'eksdrev' ),
		'before_widget' => '<div class="social-icons social_ok">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Соц.сети - Инстаграмм', 'eksdrev' ),
		'id'            => 'social-inst',
		'description'   => esc_html__( 'Добавьте ссылку сюда.', 'eksdrev' ),
		'before_widget' => '<div class="social-icons social_inst">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Контент внизу подвала', 'eksdrev' ),
		'id'            => 'f-bottom-1',
		'description'   => esc_html__( 'Добавьте ссылку сюда.', 'eksdrev' ),
		'before_widget' => '<div class="footer__copy-c1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'eksdrev_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eksdrev_scripts() {
	$eksdrev_url = get_template_directory_uri();

	wp_enqueue_style( 'eksdrev-style', get_stylesheet_uri() );

	wp_enqueue_style( 'normalize-style', $eksdrev_url . "/lightbox/css/lightbox.min.css", array(), '2', 'all' );

	wp_enqueue_style( 'slick-style' ,  $eksdrev_url . "/slick/slick.css", array(), '2', 'all' );

	wp_enqueue_style( 'slick-theme' ,  $eksdrev_url . "/slick/slick-theme.css", array(), '2', 'all' );

	wp_enqueue_script( 'eksdrev-jquery', $eksdrev_url . '/js/jquery-3.3.1.min.js', array(), '20151215', true );

	wp_enqueue_script( 'eksdrev-jquery-migrate', $eksdrev_url . '/js/jquery-migrate-3.0.1.min.js', array(), '20151215', true );

	wp_enqueue_script( 'eksdrev-slick', $eksdrev_url . '/slick/slick.min.js', array(), '20151215', true );

	wp_enqueue_script( 'eksdrev-skip-link-focus-fix', $eksdrev_url . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'eksdrev-lightbox', $eksdrev_url . '/lightbox/js/lightbox.min.js', array(), '20151215', true );

	wp_enqueue_script( 'eksdrev-mainscript', $eksdrev_url . '/js/main.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eksdrev_scripts' );

/**
 * require TGM.
 */
require get_template_directory() . '/tgm/tgm-files.php';

/**
 * require clients.
 */
require get_template_directory() . '/inc/clients.php';

/**
 * require materials.
 */
require get_template_directory() . '/inc/materials.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
