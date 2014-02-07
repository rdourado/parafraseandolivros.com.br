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
					'label_submit' => 'Enviar',
					'fields' => array(
						'author' =>
							'<p class="comment-form-author"><label for="author">Nome</label> ' .
							( $req ? '<span class="required">*</span>' : '' ) .
							'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
							'" size="30"' . $aria_req . ' placeholder="seu nome*" /></p>',
						'email' =>
							'<p class="comment-form-email"><label for="email">Email</label> ' .
							( $req ? '<span class="required">*</span>' : '' ) .
							'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
							'" size="30"' . $aria_req . ' placeholder="seu email*" /></p>',
						'url' =>
							'<p class="comment-form-url"><label for="url">Site</label>' .
							'<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) .
							'" size="30" placeholder="site ou blog" /></p>',
					),
					'comment_field' => '<p class="comment-form-comment"><label for="comment">Comentário</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="escreva seu comentário"></textarea></p>'
				) ); 
				?>
			</div>
