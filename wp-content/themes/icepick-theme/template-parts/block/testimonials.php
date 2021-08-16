<?php /* Block Name: Testimonials Block */ ?>
<section class="testimonials">
	<div class="container position-relative">
        <h2 class="section-title-28"><?php the_field('title')?></h2>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="testimonials-slider">
                <?php $slider_count = 0 ?>
                <?php if( have_rows('list') ): while ( have_rows('list') ) : the_row(); ?>
                    <div class="testimonial-slide">
                        <div class="testimonial-slide-wrap">
                            <div class="testimonial-note item-text-23"><?php the_sub_field('note')?></div>
                            <div class="testimonial-name item-text-22"><?php the_sub_field('name')?></div>
                            <div class="testimonial-info item-text-12">
                                <span class=""><?php the_sub_field('text')?></span> <span class=""><?php the_sub_field('date')?></span>
                            </div>
                        </div>
                    </div>
                    <?php $slider_count++ ?>
                <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonials-nav">
        <div class="testimonials-wrap">
            <div class="testimonials-nav__line"></div>
            <div class="testimonials-nav__numb">
                <span class="testimonials-nav__numb-current">01</span>
                <span class="testimonials-nav__numb-total">/<?php echo sprintf("%02d", $slider_count);?></span>
            </div>
        </div>
	</div>
</section>
<script>
	(function($){
		$(document).ready(function() {
			$('.testimonials-slider').slick({
				dots: false,
				infinite: true,
				arrows: false,
				speed: 300,
				slidesToShow: 1,
				adaptiveHeight: true,
				autoplay: true,
  				autoplaySpeed: 2000,
			}).on('afterChange', function(event, slick, currentSlide) {
				var cur_slide = currentSlide + 1;
				$('.testimonials-nav__numb-current').text(('0' + cur_slide).slice(-2));
			});
		})
	})(jQuery)
</script>