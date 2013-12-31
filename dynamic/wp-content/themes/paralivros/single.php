<?php 	get_header() ?>
		<section class="body" role="region">
<?php 		while ( have_posts() ) : the_post(); ?>
<?php 		get_template_part( 'content', $post->post_type ) ?>
			<section class="post-author">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
				<h3 class="author-name"><?php the_author_meta( 'display_name' ) ?></h3>
				<p><?php the_author_meta( 'description' ) ?></p>
			</section>
<?php 		endwhile; ?>
			<section class="related">
				<h3 class="related-heading">Continue Parafraseando</h3>
				<ul class="related-list">
					<li class="related-item">
						<a href="#">
							<img alt="" class="related-image" height="110" src="http://dummyimage.com/220x220" width="110">
							<h4 class="related-title">[promoção] Dia Internacional da Mulher</h4>
						</a>
					</li>
					<li class="related-item">
						<a href="#">
							<img alt="" class="related-image" height="110" src="http://dummyimage.com/220x220" width="110">
							<h4 class="related-title">[evento] Fantasy, MRG e Rapaduracast em São Paulo</h4>
						</a>
					</li>
					<li class="related-item">
						<a href="#">
							<img alt="" class="related-image" height="110" src="http://dummyimage.com/220x220" width="110">
							<h4 class="related-title">os três livros que mudaram minha forma de ver e viver a vida</h4>
						</a>
					</li>
					<li class="related-item">
						<a href="#">
							<img alt="" class="related-image" height="110" src="http://dummyimage.com/220x220" width="110">
							<h4 class="related-title">[promoção] Dia Internacional da Mulher</h4>
						</a>
					</li>
					<li class="related-item">
						<a href="#">
							<img alt="" class="related-image" height="110" src="http://dummyimage.com/220x220" width="110">
							<h4 class="related-title">[evento] Fantasy, MRG e Rapaduracast em São Paulo</h4>
						</a>
					</li>
					<li class="related-item">
						<a href="#">
							<img alt="" class="related-image" height="110" src="http://dummyimage.com/220x220" width="110">
							<h4 class="related-title">os três livros que mudaram minha forma de ver e viver a vida</h4>
						</a>
					</li>
				</ul>
			</section>
			<nav class="nav-links">
				<?php 
				previous_post_link( '%link', '%title' );
				next_post_link( '%link', '%title' );
				?>
			</nav>
<?php 		comments_template() ?>
		</section>
<?php 	get_footer() ?>