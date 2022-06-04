<?php

// STYLE
function ms_add_theme_scripts() {
	// CSS
	wp_enqueue_style( 'owl-style', get_template_directory_uri() . "/assets/css/owl.carousel.min.css", false, '1.0' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . "/assets/css/main.min.css", false, '1.0' );
	
	// JS
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . "/assets/js/bootstrap.min.js", ['jquery'], '1.0', true );
	wp_enqueue_script( 'owl-js', get_template_directory_uri() . "/assets/js/owl.carousel.min.js", ['jquery'], '1.0', true );
	wp_enqueue_script( 'gallery-js', get_template_directory_uri() . "/assets/js/gallery.js", ['jquery', 'owl-js'], '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'ms_add_theme_scripts' );

add_action( 'init', function()
{
    $locations = [
        'main' => 'Navegacao Principal',
        'footer' => 'Navegacao Footer',
    ];
    register_nav_menus( $locations );
});

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dommotion_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Right Sidebar', 'dommotion' ),
			'id'            => 'sidebar-right',
			'description'   => esc_html__( 'Add widgets here.', 'dommotion' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dommotion_widgets_init' );

// init widgets
require get_template_directory() . '/includes/widgets.php';


// Extensions
add_theme_support( 'title-tag' );

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1568, 9999 );

/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


// HEADER CLEAN UP
function ms_remove_version() {
	return '';
}
add_filter('the_generator', 'ms_remove_version');

remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0); 
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');

function ms_remove_wp_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'ms_remove_wp_block_library_css' );


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


// REMOVE EMBED
function my_deregister_scripts(){
	wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


// DISABLE XMLRPC
add_filter('xmlrpc_enabled', '__return_false');


// DISABLE ADMIN BAR
add_filter('show_admin_bar', '__return_false');


$location_settings = [
                'main' => [
                    'items_wrap' => '<ul class="%2$s navbar-nav">%3$s</ul>',
                    'links_class' => 'class="nav-link" ',
                    'list_class' => 'nav-item',
                ],
                'footer' => [
                    'items_wrap' => '<ul class="%2$s text-small">%3$s</ul>',
                    'links_class' => 'class="text-muted" ',
                    'list_class' => 'item',
                ],
            ];
/**
 * Render menu from a specific location in the theme.
 *
 * @param string $location Location of the menu set in the theme template.
 * @return string The rendered menu from location
 */
function render_menu($location)
{
    global $location_settings;

    if ( !isset($location_settings[$location]) ) {
        return "";
    }

    $params = [
            'theme_location' => $location,
            'container' => false,
            'echo' => false,
            'menu_class' => 'list-unstyled',
            'items_wrap' => $location_settings[$location]['items_wrap']
        ];

    $nav = wp_nav_menu( $params );
    
    return str_replace('<a ', '<a ' . $location_settings[$location]['links_class'], $nav);
}


/**
 * Customize css classes for menu item
 *
 * @param  array $classes Array with all the css classes
 * @param  object $item Object with all menu item attributes
 * @param  object $args Arguments used for rendering menu.
 * @return array $classes Array with list of css classes.
 */
function menu_item_classes($classes, $item, $args)
{
    global $location_settings;

    if ( !empty($location_settings[$args->theme_location]) ) {
        $classes = [$location_settings[$args->theme_location]['list_class']];
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'menu_item_classes', 1, 3);



// BLOG STUFF
function dommotion_excerpt_length( $length ) {
	return 5;
}
add_filter( 'excerpt_length', 'dommotion_excerpt_length' );

function dommotion_continue_reading_link() {
	return '<br/><a class="read-more btn btn-primary mt-3 d-inline-block" href="'. get_permalink() . '">ver mais</a>';
}

function dommotion_auto_excerpt_more( $more ) {
	return ' &hellip;' . dommotion_continue_reading_link();
}
add_filter( 'excerpt_more', 'dommotion_auto_excerpt_more' );
