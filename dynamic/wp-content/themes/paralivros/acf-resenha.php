<?php global $post; ?>
					<div class="book-review rating-<?php echo strtolower( get_field( 'classificacao' ) ); ?>">
						<div class="book-aside">
							<em class="book-rating"><?php echo strtoupper( get_field( 'classificacao' ) ); ?></em>
<?php 						if ( $url = esc_url( get_field( 'skoob_url' ) ) ) : ?>
							<div class="social-item">
								<a data-icon="k" href="<?php echo $url; ?>" target="_blank" title="Skoob">Skoob</a>
							</div>
<?php 						endif; ?>
<?php 						if ( $url = esc_url( get_field( 'goodreads_url' ) ) ) : ?>
							<div class="social-item">
								<a data-icon="r" href="<?php echo $url; ?>" target="_blank" title="Goodreads">Goodreads</a>
							</div>
<?php 						endif; ?>
						</div>
<?php 					if ( $capa = get_field( 'capa' ) ) : ?>
						<div class="book-cover">
							<h2 class="book-heading">Capa</h2>
							<img alt="" height="300" src="<?php echo $capa['sizes']['cover']; ?>" width="200">
						</div>
<?php 					endif; ?>
						<div class="book-data">
							<h2 class="book-heading">Informações Técnicas</h2>
<?php 						if ( $val = get_field( 'titulo' ) ) : ?>
							<dl class="book-meta">
								<dt class="book-term">Título</dt>
								<dd class="book-info"><?php echo $val; ?></dd>
							</dl>
<?php 						endif; ?>
<?php 						if ( $val = get_field( 'serie' ) ) : ?>
							<dl class="book-meta">
								<dt class="book-term">Série</dt>
								<dd class="book-info"><?php echo $val; ?></dd>
							</dl>
<?php 						endif; ?>
<?php 						if ( $val = get_field( 'autor' ) ) : ?>
							<dl class="book-meta">
								<dt class="book-term">Autor</dt>
								<dd class="book-info"><?php echo $val; ?></dd>
							</dl>
<?php 						endif; ?>
<?php 						if ( $val = get_field( 'editora' ) ) : ?>
							<dl class="book-meta">
								<dt class="book-term">Editora</dt>
								<dd class="book-info"><?php echo $val; ?></dd>
							</dl>
<?php 						endif; ?>
<?php 						if ( $val = get_field( 'paginas' ) ) : ?>
							<dl class="book-meta">
								<dt class="book-term">Páginas</dt>
								<dd class="book-info"><?php echo $val; ?></dd>
							</dl>
<?php 						endif; ?>
<?php 						if ( $val = get_field( 'publicado_em' ) ) : ?>
							<dl class="book-meta">
								<dt class="book-term">Publicado em</dt>
								<dd class="book-info"><?php echo $val; ?></dd>
							</dl>
<?php 						endif; ?>
						</div>
<?php 					$grades = array( get_field( 'nota_design' ), get_field( 'nota_historia' ) ); ?>
						<div class="book-grade">
							<h2 class="book-heading">Avaliação</h2>
							<strong class="book-total"><?php my_grade( $grades ) ?>
							<span class="book-stars" style="width:<?php my_grade_pct( $grades ) ?>"></span></strong>
<?php 						if ( get_field( 'nota_design' ) >= 0 ) : ?>
							<dl class="book-meta">
								<dt class="book-term">Design</dt>
								<dd class="book-info"><?php the_field( 'nota_design' ) ?></dd>
							</dl>
<?php 						endif; ?>
							<dl class="book-meta">
								<dt class="book-term">História</dt>
								<dd class="book-info"><?php the_field( 'nota_historia' ) ?></dd>
							</dl>
						</div>
					</div>
