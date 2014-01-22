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
	add_image_size( 'cover', 200, 300, true );

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

add_filter( 'the_content', 'my_content' );
add_filter( 'wp_list_categories', 'my_list_categories' );

function my_content( $content ) {
	return preg_replace( '/<hr.*?>/', '<div class="hr"><hr></div>', $content );
}

function my_list_categories( $html ) {
	return preg_replace( '/\((.*?)\)/', '<span>$1</span>', $html );
}

// My Functions

function organize_posts( $loop ) {
	while ( $loop->have_posts() ) : $loop->the_post();
		global $post;
		$title = html_entity_decode( trim( get_the_title() ) );
		// Remove “resenha”
		$title = preg_replace( '/^\[?[Rr]esenha.*?[\]:-]\s/', '', $title );
		// Coloca artigo do título por último
		$title = preg_replace( '/^((a|A|à|À|em|Em|o|O|um|Um|un|Un|ao|Ao|uma|Uma)s?)\s(.*?)\s–/', '$3, $1 –', $title );
		$title = ucfirst( $title );
		// Salva versão limpa do título
		$clean = remove_accents( $title );
		$title = htmlentities( $title );
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
	foreach( $grades as $grade ) 
		$final_grade += $grade;
	$final_grade /= count( $grades );
	echo $final_grade;
}

function my_grade_pct( $grades ) {
	$grades = array_filter( $grades );
	$final_grade = 0;
	foreach( $grades as $grade ) 
		$final_grade += $grade;
	$final_grade /= count( $grades );
	echo (100 * $final_grade / 5) . '%';
}

/*function make_comparer() {
    // Normalize criteria up front so that the comparer finds everything tidy
    $criteria = func_get_args();
    foreach ($criteria as $index => $criterion) {
        $criteria[$index] = is_array($criterion)
            ? array_pad($criterion, 3, null)
            : array($criterion, SORT_ASC, null);
    }

    return function($first, $second) use (&$criteria) {
        foreach ($criteria as $criterion) {
            // How will we compare this round?
            list($column, $sortOrder, $projection) = $criterion;
            $sortOrder = $sortOrder === SORT_DESC ? -1 : 1;

            // If a projection was defined project the values now
            if ($projection) {
                $lhs = call_user_func($projection, $first[$column]);
                $rhs = call_user_func($projection, $second[$column]);
            }
            else {
                $lhs = $first[$column];
                $rhs = $second[$column];
            }

            // Do the actual comparison; do not return if equal
            if ($lhs < $rhs) {
                return -1 * $sortOrder;
            }
            else if ($lhs > $rhs) {
                return 1 * $sortOrder;
            }
        }

        return 0; // tiebreakers exhausted, so $first == $second
    };
}*/