global.$ = global.jQuery = require('jquery');

import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

(function ($) {
    "use strict";

    const beEventsCarousel = () =>{

        const $block = $('.be-events-carousel');
		if ($block.length === 0) return;

        $block.each(function () {
            let $slider       = $(this).find('.be-events-carousel-inner'),
                $dataSlider   = $slider.data('carousel');
            
            let opt_df = {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false,
				autoplay: true,
				arrows: false,
                adaptiveHeight: false,
                fade: false,
                cssEase: 'linear',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 1
                      }
                    },
                  ]
			};
			$slider.slick(Object.assign({}, opt_df, $dataSlider));
        })
    }


    $(window).on("scroll", function () {

    });

    $(document).ready(function () {
        beEventsCarousel()
    })

})(jQuery);