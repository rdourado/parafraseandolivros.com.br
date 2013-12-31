<?php 

function home() {
	echo home_url( '/' );
}

function name() {
	echo get_bloginfo( 'name' );
}

function url() {
	echo get_stylesheet_directory_uri();
}

// Actions

add_action( 'after_setup_theme', 'my_setup' );
add_action( 'widgets_init', 'my_widgets_init' );
add_action( 'wp_enqueue_scripts', 'my_scripts' );

function my_setup() {
	// add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url() ) );
	add_theme_support( 'automatic-feed-links' );

	// add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size( 672, 372, true );
	// add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	register_nav_menus( array(
		'primary'   => 'Cabeçalho',
		'secondary' => 'Rodapé',
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
}

function my_widgets_init() {
	register_sidebar( array(
		'name'          => 'Lateral',
		'id'            => 'sidebar-1',
		// 'description'   => 'Lateral',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

function my_scripts() {
	wp_enqueue_script( 'retina', get_template_directory_uri() . '/js/retina-1.1.0.min.js', array( 'jquery' ), null, true );
}

// Filters

add_filter( 'wp_list_categories', 'my_list_categories' );

function my_list_categories( $html ) {
	return preg_replace( '/\((.*?)\)/', '<span>$1</span>', $html );
}