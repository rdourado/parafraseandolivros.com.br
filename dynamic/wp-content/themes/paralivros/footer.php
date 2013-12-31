<?php 	get_sidebar() ?>
	</div>
	<hr>
	<footer class="foot">
		<ul class="foot-menu">
			<li class="menu-item"><a href="#">Amigos do blog</a></li>
			<li class="menu-item"><a href="#">Contato</a></li>
			<li class="menu-item"><a href="#">Lista de resenhas</a></li>
			<li class="menu-item"><a href="#">Políticas do blog</a></li>
			<li class="menu-item"><a href="#">Sobre o blog e a autora</a></li>
		</ul>
		<ul class="foot-social">
			<li class="social-item"><a data-icon="f" href="#" target="_blank" title="Facebook">Facebook</a></li>
			<li class="social-item"><a data-icon="t" href="#" target="_blank" title="Twitter">Twitter</a></li>
			<li class="social-item"><a data-icon="i" href="#" target="_blank" title="Instagram">Instagram</a></li>
			<li class="social-item"><a data-icon="p" href="#" target="_blank" title="Pinterest">Pinterest</a></li>
			<li class="social-item"><a data-icon="g" href="#" target="_blank" title="Google+">Google+</a></li>
			<li class="social-item"><a data-icon="s" href="#" target="_blank" title="RSS">RSS</a></li>
			<li class="social-item"><a data-icon="k" href="#" target="_blank" title="Skoob">Skoob</a></li>
			<li class="social-item"><a data-icon="r" href="#" target="_blank" title="GoodReads">GoodReads</a></li>
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
	<?php wp_footer() ?>
</body>
</html>