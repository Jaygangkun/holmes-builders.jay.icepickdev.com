<?php /* Block Name: Home Hero Block */ ?>
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