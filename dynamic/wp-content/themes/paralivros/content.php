			<article <?php post_class( 'entry h-entry' ) ?> role="article">
				<h1 class="post-title p-name">
					<a class="u-url" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a>
				</h1>
				<ul class="post-meta">
					<li class="post-meta-date"><?php edit_post_link( 'Editar' ) ?></li>
				</ul>
				<div class="post-content e-content">
					<?php the_content( '<span>Leia mais…</span>' ) ?>
				</div>
			</article>
