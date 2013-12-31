			<article <?php post_class( 'entry h-entry' ) ?> role="article">
				<h1 class="post-title p-name">
					<a class="u-url" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a>
				</h1>
				<ul class="post-meta">
					<li class="post-meta-date"><?php edit_post_link( 'Editar', '', '&nbsp;&nbsp;–&nbsp;&nbsp;' ) ?><time class="post-date dt-published" datetime="<?php the_time( 'Y-m-d H:i:s' ) ?>"><?php the_time( get_option( 'date_format' ) ) ?></time></li>
					<li class="post-meta-author">por
					<a class="p-author h-card" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?php the_author_meta( 'display_name' ) ?></a></li>
					<li class="post-meta-category"><?php the_category( ', ' ) ?></li>
					<li class="post-meta-comments"><a href="<?php comments_link() ?>"><?php comments_number( '0 comentários', '1 comentário', '% comentários' ) ?></a></li>
				</ul>
				<div class="post-content e-content">
					<?php the_content( '<span>Leia mais…</span>' ) ?>
				</div>
			</article>
