<?php 
/*
Template name: Lista de Resenhas
*/
?>
<?php 	get_header() ?>
		<section class="body" role="region">
<?php 		while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entry h-entry' ) ?> role="article">
				<h1 class="post-title p-name">
					<a class="u-url" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a>
				</h1>
				<ul class="post-meta">
					<li class="post-meta-date"><?php edit_post_link( 'Editar' ) ?></li>
				</ul>
				<div class="post-content e-content">
<?php 				$query = new WP_Query( "category_name=resenha&posts_per_page=-1&orderby=title&order=ASC" );
					$posts = organize_posts( $query ); ?>
					<ul class="letters">
<?php 					foreach ( $posts as $letter => $data ) : ?>
						<li class="letter"><a href="#<?php echo $letter; ?>"><?php echo $letter; ?></a></li>
<?php 					endforeach; ?>
					</ul>
<?php 				foreach ( $posts as $letter => $data ) : ?>
					<h3 id="<?php echo $letter; ?>"><?php echo $letter; ?></h3>
					<ul>
<?php 					usort( $data, make_comparer( 'clean' ) );
						foreach ( $data as $row ) : ?>
						<li><?php echo $row['title'] ?> [<a href="<?php echo get_permalink( $row['post'] ); ?>">link</a>]</li>
<?php 					endforeach; ?>
					</ul>
<?php 				endforeach; ?>
				</div>
			</article>
<?php 		endwhile; ?>
		</section>
<?php 	get_footer() ?>