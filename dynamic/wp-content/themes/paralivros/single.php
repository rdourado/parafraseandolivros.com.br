<?php 	get_header() ?>
		<section class="body" role="region">
<?php 		while ( have_posts() ) : the_post(); ?>
<?php 		get_template_part( 'content', $post->post_type ) ?>
			<section class="post-author">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
				<h3 class="author-name"><?php the_author_meta( 'display_name' ) ?></h3>
				<p><?php get_field( 'saudacao' ) ? the_field( 'saudacao' ) : the_author_meta( 'description' ); ?></p>
			</section>
<?php 		endwhile; ?>
<?php 		$related = my_related_posts();
			if ( $related->have_posts() ) : ?>
			<section class="related">
				<h3 class="related-heading">Continue Parafraseando</h3>
				<ul class="related-list">
<?php 				while( $related->have_posts() ) : $related->the_post(); ?>
					<li class="related-item">
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail( 'related', array( 'class' => 'related-image' ) ); ?>
							<h4 class="related-title"><?php the_title() ?></h4>
						</a>
					</li>
<?php 				endwhile; ?>
				</ul>
			</section>
<?php 		endif;
			wp_reset_postdata(); ?>
			<nav class="nav-links">
				<?php 
				previous_post_link( '%link', '%title' );
				next_post_link( '%link', '%title' );
				?>
			</nav>
<?php 		comments_template() ?>
		</section>
<?php 	get_footer() ?>