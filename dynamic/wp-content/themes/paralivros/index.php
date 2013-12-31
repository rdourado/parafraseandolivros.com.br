<?php 	get_header() ?>
		<section class="body" role="region">
<?php 		
			while ( have_posts() ) : 
				the_post();
				get_template_part( 'content', $post->post_type );
			endwhile;
?>
		</section>
<?php 	get_footer() ?>