<?php /* Block Name: Home Sites Block */ ?>
<section class="home-sites">
	<div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-lg-9 col-md-8">
                <h2 class="section-title-30"><?php the_field('title')?></h2>
            </div>
            <?php
            $link = get_field('link');
            if($link) {
                ?>
                <div class="col-lg-3 col-md-4 home-sites-link-wrap">
                    <a class="link link-black" href="<?php echo $link['url']?>" target="<?php echo $link['target']?>"><?php echo $link['title']?></a>
                </div>
                <?php
            }
            ?>
            
        </div>
    </div>
    <div class="home-sites-slider">
    <?php if( have_rows('list') ): while ( have_rows('list') ) : the_row(); ?>
        <div class="home-sites-slide">
            <?php
            $img = get_sub_field('image');
            $img_url = '';
            if($img) {
                $img_url = $img['url'];
            }
            ?>
            <div class="home-sites-slide-wrap" style="background-image: url(<?php echo $img_url?>)">
                <div class="home-sites-slide-info">
                    <div class="item-text-25 home-sites-slide__name"><?php the_sub_field('name')?></div>
                    <div class="item-text-10"><?php the_sub_field('location')?></div>
                    <?php
                    $link = get_sub_field('link');
                    if($link) {
                        ?>
                        <a class="link link-black home-sites-slide__link" href="<?php echo $link['url']?>" target="<?php echo $link['target']?>"><?php echo $link['title']?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
    </div>
</section>
<script>
	(function($){
		$(document).ready(function() {
			$('.home-sites-slider').slick({
				slidesToShow: 3,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                ]
			})
		})
	})(jQuery)
</script>