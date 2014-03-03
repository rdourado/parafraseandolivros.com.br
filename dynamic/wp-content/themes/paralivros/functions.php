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

add_action( 'pre_ping', 'no_self_ping' );
add_action( 'after_setup_theme', 'my_setup' );
add_action( 'widgets_init', 'my_widgets_init' );
add_action( 'wp_enqueue_scripts', 'my_scripts' );

function no_self_ping( &$links ) {
	$home = get_option( 'home' );
	foreach ( $links as $l => $link )
		if ( 0 === strpos( $link, $home ) )
			unset( $links[$l] );
}

function my_setup() {
	// add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url() ) );
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails', array( 'post' ) );
	// set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'cover', 200, 300, true );
	add_image_size( 'related', 220, 220, true );

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
	// jQuery
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.10.1.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );

	// My scripts
	wp_enqueue_script( 'interface', get_template_directory_uri() . '/js/interface.min.js', array( 'jquery' ), filemtime( TEMPLATEPATH . '/js/interface.min.js' ), true );
}

// Filters

add_filter( 'the_content', 'my_content' );
add_filter( 'wp_list_categories', 'my_list_categories' );
add_filter( 'get_archives_link', 'my_list_categories' );
add_filter( 'mce_buttons', 'add_more_buttons' );
add_filter( 'the_content_feed', 'my_content_feed' );

function my_content( $content ) {
	return preg_replace( '/<hr.*?>/', '<div class="hr"><hr></div>', $content );
}

function my_list_categories( $html ) {
	$html = str_replace( '&nbsp;', '', $html );
	$html = preg_replace( '/\((.*?)\)/', '<span>$1</span>', $html );
	return $html;
}

function add_more_buttons( $buttons ) {
	$buttons[] = 'hr';
	// $buttons[] = 'del';
	// $buttons[] = 'sub';
	// $buttons[] = 'sup';
	// $buttons[] = 'fontselect';
	// $buttons[] = 'fontsizeselect';
	// $buttons[] = 'cleanup';
	// $buttons[] = 'styleselect';
	return $buttons;
}

function my_content_feed( $content ) {
	if ( in_category( 'lancamentos' ) ) {
		ob_start();
		get_template_part( 'acf', 'lancamentos' );
		$output = ob_get_clean();
		return $content . $output;
	} else if ( in_category( 'resenha' ) ) {
		ob_start();
		get_template_part( 'acf', 'resenha' );
		$output = ob_get_clean();
		return $output . $content;
	}
	return $content;
}

// My Functions

function organize_posts( $loop ) {
	while ( $loop->have_posts() ) : $loop->the_post();
		global $post;
		$title = html_entity_decode( trim( get_the_title() ), ENT_COMPAT, 'UTF-8' );
		// Remove “resenha”
		$title = preg_replace( '/^\[?[Rr]esenha.*?[\]:-]\s/', '', $title );
		// Coloca artigo do título por último
		$title = preg_replace( '/^((a|A|à|À|em|Em|o|O|um|Um|un|Un|ao|Ao|uma|Uma)s?)\s(.*?)\s–/', '$3, $1 –', $title );
		$title = ucfirst( $title );
		// Salva versão limpa do título
		$clean = remove_accents( $title );
		$title = htmlentities( $title, ENT_COMPAT, 'UTF-8' );
		// Transforma textos entre ‘–’ em itálico
		$title = preg_replace( '/^(.*?(?=(&ndash;|$)))/', '<b>$1</b>', $title );
		$title = preg_replace( '/(&ndash;)\s(.*?)\s(&ndash;)/', '&ndash; <i>$2</i> &ndash;', $title );
		$first = preg_match( '/^[^a-zA-Z]?([a-zA-Z]).*?\s/', $clean, $first ) ? strtoupper( end( $first ) ) : '?';
		$arr = array( 'title' => $title, 'clean' => $clean, 'post' => $post );
		isset($posts[$first]) ? ($posts[$first][] = $arr) : ($posts[$first] = array($arr));
	endwhile;
	ksort( $posts );
	wp_reset_postdata();
	return $posts;
}

function sort2d_bycolumn( $array, $column, $method, $has_header ) {
	if ( $has_header ) 
		$header = array_shift( $array );
	foreach ( $array as $key => $row ) 
		$narray[$key] = $row[$column]; 
	array_multisort( $narray, $method, $array );
	if ( $has_header )
		array_unshift( $array, $header );
	return $array;
}

function my_grade( $grades ) {
	$grades = array_filter( $grades );
	$final_grade = 0;
	if ( ! empty( $grades ) ) {
		foreach( $grades as $index => $grade ) 
			if ( $grade < 0 )
				unset( $grades[$index] );
		foreach( $grades as $grade ) 
			$final_grade += $grade;
		$final_grade /= count( $grades );
	}
	echo $final_grade;
}

function my_grade_pct( $grades ) {
	$grades = array_filter( $grades );
	$final_grade = 0;
	foreach( $grades as $index => $grade ) 
		if ( $grade < 0 )
			unset( $grades[$index] );
	foreach( $grades as $grade ) 
		$final_grade += $grade;
	$final_grade /= count( $grades );
	echo (100 * $final_grade / 5) . '%';
}

function my_related_posts() {
	global $post;

	$tags = wp_get_post_tags( $post->ID );
	$tag_ids = array();

	foreach ( $tags as $individual_tag ) 
		$tag_ids[] = $individual_tag->term_id;

	$args = array(
		'tag__in' => $tag_ids,
		'post__not_in' => array( $post->ID ),
		'posts_per_page' => 6,
		'caller_get_posts' => 1
	);

	return new WP_Query( $args );
}

// Share This

add_action( 'wp_head', 'remove_st', 11 );
function remove_st() {
	remove_filter( 'the_content', 'st_add_widget' );
}
