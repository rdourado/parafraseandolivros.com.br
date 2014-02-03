<?php 				global $post;
					while ( has_sub_field( 'grupos' ) ) : ?>
<?php 				if ( get_sub_field( 'nome' ) ) : ?>
					<h2><?php the_sub_field( 'nome' ) ?></h2>
<?php 				endif; ?>
<?php 				if ( get_sub_field( 'texto' ) ) : ?>
					<p><?php the_sub_field( 'texto' ) ?></p>
<?php 				endif; ?>
<?php 				if ( get_sub_field( 'livros' ) ) : ?>
					<ul class="books">
<?php 					while( has_sub_field( 'livros' ) ) : ?>
						<li>
							<?php echo wp_get_attachment_image( get_sub_field( 'capa' ), 'cover' ) ?>
<?php 						if ( get_sub_field( 'sinopse' ) ) : ?>
							<div class="book-summary">
								<h3 class="summary-title">Sinopse</h3>
								<p><?php the_sub_field( 'sinopse' ) ?></p>
							</div>
<?php 						endif; ?>
							<dl class="book-meta">
								<dt class="book-term">Título</dt>
								<dd class="book-info"><?php the_sub_field( 'titulo' ) ?></dd>
							</dl>
							<dl class="book-meta">
								<dt class="book-term">Série</dt>
								<dd class="book-info"><?php the_sub_field( 'serie' ) ?></dd>
							</dl>
							<dl class="book-meta">
								<dt class="book-term">Autor</dt>
								<dd class="book-info"><?php the_sub_field( 'autor' ) ?></dd>
							</dl>
<?php 						if ( get_sub_field( 'trecho' ) ) : ?>
							<a href="<?php echo esc_url( get_sub_field( 'trecho' ) ); ?>" class="book-read-excerpt">Leia um trecho</a>
<?php 						endif; ?>
							<div class="book-social">
<?php 							if ( get_sub_field( 'skoob' ) ) : ?>
								<div class="social-item">
									<a data-icon="k" href="<?php echo esc_url( get_sub_field( 'skoob' ) ); ?>" target="_blank" title="Skoob">Skoob</a>
								</div>
<?php 							endif; ?>
<?php 							if ( get_sub_field( 'goodreads' ) ) : ?>
								<div class="social-item">
									<a data-icon="r" href="<?php echo esc_url( get_sub_field( 'goodreads' ) ); ?>" target="_blank" title="Goodreads">Goodreads</a>
								</div>
<?php 							endif; ?>
							</div>
						</li>
<?php 					endwhile; ?>
					</ul>
<?php 				endif;
					endwhile; ?>