/*jslint browser: true*/
/*global jQuery */

(function( $ ) {
	$.fn.horizontalScrollMenu = function() {
		return this.each(function(index) {
			var menu = $(this);
			var menuUl = menu.find('.container ul');
			var menuItems = menuUl.children();

			var itemWidth = menuItems.first().width();
			var menuWidth = menuUl.parent().width();
            var menuSize = menuItems.length;
            // menuWidth is added to the menuSize to account for rounding errors in the itemwidth
			var visibleItems = Math.floor((menuWidth+menuSize)/itemWidth);


			var menuSize = menuItems.length;

			var currentMargin = 0;
			var menuPosition = 0;

			var menuNext = menu.find('.next');
			var menuPrev = menu.find('.prev')
								.addClass('disabled');

			menuNext.on('click', function(e) {
				e.preventDefault();
				if (!$(this).hasClass('disabled')) {
					currentMargin = Math.round(parseFloat(menuUl.css('margin-left')));
					menuUl.css('margin-left', currentMargin-itemWidth+'px');
					menuPrev.removeClass('disabled');
					menuPosition++;

					if (menuPosition+visibleItems >= menuSize) {
						menuNext.addClass('disabled');
					}
				}
			});

			menuPrev.on('click', function(e) {
				e.preventDefault();
				if (!$(this).hasClass('disabled')) {
					currentMargin = Math.round(parseFloat(menuUl.css('margin-left')));
					menuUl.css('margin-left', currentMargin+itemWidth+'px');
					menuNext.removeClass('disabled');
					menuPosition--;

					if (menuPosition === 0) {
						menuPrev.addClass('disabled');
					}
				}
			});
		});
	}
} (jQuery));