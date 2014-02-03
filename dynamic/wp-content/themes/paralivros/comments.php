			<div class="comments-area" id="comments">
<?php 			if ( have_comments() ) : ?>
				<h2 class="comments-title"><?php comments_number( '0 Comentários', '1 Comentário', '% Comentários' ) ?></h2>
				<ol class="comment-list">
					<?php
					wp_list_comments( array(
						'style'      => 'ol',
						'short_ping' => true,
						'avatar_size'=> 80,
					) );
					?>
				</ol>
				<?php 
				endif;
				comment_form( array(
					'title_reply' => 'Quer parafrasear também?',
					'label_submit' => 'Enviar'
				) ); 
				?>
			</div>
