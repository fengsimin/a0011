$(document).ready(function () {

	var $items = JSON.parse(items);

    var swiper_options = {
		pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
		paginationClickable: true,
		keyboardControl: true,
		mousewheelControl: true,
//      hashnav: true,
        preloadImages: false,
        lazyLoading: true,
		onInit: function(swiper) {

            $slide = $(swiper.slides[0]);
			$slide.css('background-image', 'url('+$slide.data('path')+'/'+$slide.data('image')+'?v='+$slide.data('utime')+')');
			
			var clone = $(swiper.slides[0]).find('article').clone();

			$('#clone').html(clone);
			$('#bgcolor').css('background-color', $slide.data('bgcolor'));

            clone.find('h1').addClass('fadeInDown')
                .end().find('p').addClass('fadeInUp')
                .end().find('a').addClass('fadeInUp');
		},
		onSlideChangeStart: function(swiper) {
			$slide = $(swiper.slides[swiper.activeIndex]);
			$slide.css('background-image', 'url('+$slide.data('path')+'/'+$slide.data('image')+'?v='+$slide.data('utime')+')');
			
			swiper.disableMousewheelControl();
			$('#clone').empty();
			$('#bgcolor').css('background-color', $slide.data('bgcolor'));
		},
		onSlideChangeEnd: function(swiper) {
			setTimeout(function(){
            	swiper.enableMousewheelControl();
            }, 1000);
		},
		onTransitionEnd: function(swiper) {

            var clone = $(swiper.slides[swiper.activeIndex]).find('article').clone();

			$('#clone').html(clone);

			clone.find('h1').addClass('fadeInDown')
                .end().find('p').addClass('fadeInUp')
                .end().find('a').addClass('fadeInUp');
		}
    };

	var swiper = new Swiper('.swiper-container', $.extend(swiper_options, swiper_options_custom));
});
