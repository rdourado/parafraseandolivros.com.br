<?php 	get_sidebar() ?>
	</div>
	<hr>
	<footer class="foot">
		<?php 
		wp_nav_menu( array(
			'container' => '',
			'menu_class' => 'foot-menu',
			'depth' => 1,
			'fallback_cb' => false,
		) );
		?>
		<ul class="foot-social">
			<li class="social-item"><a data-icon="f" href="<?php echo FACEBOOK; ?>" target="_blank" title="Facebook">Facebook</a></li>
			<li class="social-item"><a data-icon="t" href="<?php echo TWITTER; ?>" target="_blank" title="Twitter">Twitter</a></li>
			<li class="social-item"><a data-icon="i" href="<?php echo INSTAGRAM; ?>" target="_blank" title="Instagram">Instagram</a></li>
			<li class="social-item"><a data-icon="p" href="<?php echo PINTEREST; ?>" target="_blank" title="Pinterest">Pinterest</a></li>
			<li class="social-item"><a data-icon="g" href="<?php echo GOOGLEPLUS; ?>" target="_blank" title="Google+">Google+</a></li>
			<li class="social-item"><a data-icon="s" href="<?php bloginfo( 'rss2_url' ) ?>" target="_blank" title="RSS">RSS</a></li>
			<li class="social-item"><a data-icon="k" href="<?php echo SKOOB; ?>" target="_blank" title="Skoob">Skoob</a></li>
			<li class="social-item"><a data-icon="r" href="<?php echo GOODREADS; ?>" target="_blank" title="GoodReads">GoodReads</a></li>
		</ul>
		<strong class="site-name">
			<img alt="<?php name() ?>" data-at2x="<?php url() ?>/img/logo-small@2x.png" height="26" src="<?php url() ?>/img/logo-small.png" width="214">
		</strong>
		<p class="copyright">
			todos os direitos reservados — copyright 2010-<?php echo date( 'Y' ); ?> <?php name() ?> / Samara MaiMa
			<br>
			layout por Samara Maia Mattos —
			<a href="http://www.samaramaia.com/" target="_blank">www.samaramaia.com</a>
			<br>
			desenvolvimento por Rafael Dourado —
			<a href="http://rafaeldourado.com.br/" target="_blank">www.rafaeldourado.com.br</a>
		</p>
	</footer>
	<!-- WP/ --><?php wp_footer() ?><!-- /WP -->
</body>
</html>