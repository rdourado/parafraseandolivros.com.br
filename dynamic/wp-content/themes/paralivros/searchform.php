				<form action="<?php home() ?>" class="search-form" method="get" role="search">
					<p>
						<input aria-label="digite sua busca e pressione enter" aria-required="true" id="s" name="s" placeholder="digite sua busca e pressione enter" required type="search" value="<?php the_search_query() ?>">
						<button class="s-submit" type="submit">Ok</button>
					</p>
				</form>
				<ul class="social">
					<li class="social-item social-facebook"><a data-icon="f" href="<?php echo FACEBOOK; ?>" target="_blank" title="Facebook">Facebook</a></li>
					<li class="social-item social-twitter"><a data-icon="t" href="<?php echo TWITTER; ?>" target="_blank" title="Twitter">Twitter</a></li>
					<li class="social-item social-instagram"><a data-icon="i" href="<?php echo INSTAGRAM; ?>" target="_blank" title="Instagram">Instagram</a></li>
					<li class="social-item social-pinterest"><a data-icon="p" href="<?php echo PINTEREST; ?>" target="_blank" title="Pinterest">Pinterest</a></li>
					<li class="social-item social-gplus"><a data-icon="g" href="<?php echo GOOGLEPLUS; ?>" target="_blank" title="Google+">Google+</a></li>
					<li class="social-item social-skoob"><a data-icon="k" href="<?php echo SKOOB; ?>" target="_blank" title="Skoob">Skoob</a></li>
					<li class="social-item social-goodreads"><a data-icon="r" href="<?php echo GOODREADS; ?>" target="_blank" title="GoodReads">GoodReads</a></li>
				</ul>
