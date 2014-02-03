/*
codekit-prepend "retina-1.1.0.min.js"
@codekit-prepend "fancybox/jquery.fancybox.js"
*/
function isRetina() {
	var mediaQuery = "(-webkit-min-device-pixel-ratio: 1.5),(min--moz-device-pixel-ratio: 1.5),(-o-min-device-pixel-ratio: 3/2),(min-resolution: 1.5dppx)";
	if (window.devicePixelRatio > 1) return true;
	if (window.matchMedia && window.matchMedia(mediaQuery).matches) return true;
	return false;
}
(function($) {
	// Retina
	try{
		if (isRetina()) $('img[data-at2x]').each(function() {
			$(this).attr('src', $(this).attr('data-at2x'));
		});
	}catch(e){}
	// Fancybox
	try{
		$('a[href]','.post-content').filter(function() {
			return (/\.(jpg|jpeg|gif|png)$/).test($(this).attr('href'));
		}).addClass('fancybox').attr('rel','fancybox').fancybox();
	}catch(e){}
	// Go to top
	try{
		$('body').append('<a href="#" id="go-top">Topo</a>');
		var $window = $(window);
		var $goTop = $('#go-top');
		$window.scroll(function() {
			if ($window.scrollTop() > 50) {
				$goTop.addClass('show');
			} else {
				$goTop.removeClass('show');
			}
		});
		$goTop.click(function(e){
			e.preventDefault();
			$('html,body').animate({scrollTop: 0}, 'normal');
		});
	}catch(e){}
	// Archives
	try{
		var ul, current_year;
		var div = $('<div></div>');
		var $widget = $('.widget_archive');
		$widget.on('click', '.toggle-year', function(e){
			e.preventDefault();
			$(this).next().toggle();
		});
		$widget.find('a').each(function() {
			var a = $(this);
			var li = a.parent();
			var text = a.text();
			var year = parseInt(text.substr(text.length - 4, 4));
			if (current_year !== year) {
				current_year = year;
				if (ul) ul.appendTo(div);
				div.append('<a href="#" class="toggle-year">' + year + '</a>');
				ul = $('<ul class="collapsed"></ul>');
				li.clone().appendTo(ul);
			} else {
				li.clone().appendTo(ul);
			}
		});
		if (ul) ul.appendTo(div);
		$widget.find('ul').remove();
		$widget.append(div);
		$widget.on('click', '.toggle-year', function(e) {
			e.preventDefault();
			$(this).toggleClass('toggled').next().toggleClass('collapsed');
		});
		$widget.find('a:first').toggleClass('toggled').next().toggleClass('collapsed');
	}catch(e){}
})(jQuery);