<?php /* Block Name: Home Hero Block */ ?>
<style>
	.home-hero-slide-img-wrap {
		position: relative;
		width: 100%;
		padding-top: 45%;
		background-size: cover;
		background-repeat: repeat;
		background-position: center;
	}

	.home-hero-slide-img-wrap::before {
		position: absolute;
		content: '';
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		background: linear-gradient(13.27deg, rgba(0, 0, 0, 0.56) 3.67%, rgba(0, 0, 0, 0) 56.95%);
	}

	.item-title-28 {
		font-style: normal;
		font-weight: normal;
		font-size: 28px;
		line-height: 35px;
		text-align: center;

		color: #FFFFFF;
		position: absolute;
		bottom: 80px;
		left: 50%;
		transform: translateX(-50%);
	}

	.home-hero {
		position: relative;
	}

	.home-hero-nav {
		position: absolute;
		left: 50%;
		transform: translateX(-50%);
		bottom: 40px;
	}

	.home-hero-nav-wrap {
		display: flex;
		align-items: center;
	}

	.home-hero-nav__line {
		width: 330px;
		margin-right: 20px;
		background: #ffffff;
		height: 2px;
	}

	.home-hero-nav__numb-current {
		font-style: normal;
		font-weight: 500;
		font-size: 18px;
		line-height: 18px;

		color: #FFFFFF;
	}

	.home-hero-nav__numb-total {
		font-style: normal;
		font-weight: normal;
		font-size: 14px;
		line-height: 18px;

		color: #FFFFFF;
		margin-left: -4px;
	}
</style>
<section class="home-hero">
	<div class="home-hero-slider">
	<?php $slider_count = 0 ?>
	<?php if( have_rows('list') ): while ( have_rows('list') ) : the_row(); ?>
		<div class="home-hero-slide">
			<?php
			$img = get_sub_field('image');
			$img_url = '';
			if($img){
				$img_url = $img['url'];
			}
			?>
			<div class="home-hero-slide-img-wrap" style="background-image:url(<?php echo $img_url?>)">
				<h2 class="item-title-28"><?php the_sub_field('title')?></h2>
			</div>
		</div>
		<?php $slider_count++ ?>
	<?php endwhile; endif; ?>
	</div>
	<div class="home-hero-nav">
		<div class="home-hero-nav-wrap">
			<div class="home-hero-nav__line"></div>
			<div class="home-hero-nav__numb">
				<span class="home-hero-nav__numb-current">01</span>
				<span class="home-hero-nav__numb-total">/<?php echo sprintf("%02d", $slider_count);?></span>
			</div>
		</div>
	</div>
</section>
<script>
	(function($){
		$(document).ready(function() {
			$('.home-hero-slider').slick({
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
				$('.home-hero-nav__numb-current').text(('0' + cur_slide).slice(-2));
			});
		})
	})(jQuery)
</script>