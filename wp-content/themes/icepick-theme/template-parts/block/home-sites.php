<?php /* Block Name: Home Sites Block */ ?>
<style>
    .home-sites {
        padding: 50px 0px;
    }

	.link {
        padding: 15px 60px;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 15px;

        text-align: center;
        letter-spacing: 0.07em;
        text-transform: uppercase;

        color: #212121;
        background: #ffffff;
        display: inline-block;
        cursor: pointer;
        text-decoration: none;
    }

    .link:hover {
        text-decoration: none;
        color: #212121;
        background: #ffffff;
    }

    .link-black {
        background: #212121;
        color: #ffffff;
    }

    .link-black:hover {
        background: #212121;
        color: #ffffff;
    }

    .home-sites-slider {
        margin-top: 20px;
    }

    .home-sites-slide-wrap {
        position: relative;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        width: 100%;
        height: 0px;
        padding-top: 135%;
    }

    .home-sites-slide-wrap::before {
        content: '';
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background: linear-gradient(13.27deg, rgba(0, 0, 0, 0.56) 3.67%, rgba(0, 0, 0, 0) 56.95%);
    }

    .home-sites-slide-info {
        position: absolute;   
        left: 30px;
        right: 30px;
        bottom: 30px;
    }

    .item-text-25 {
        font-style: normal;
        font-weight: normal;
        font-size: 25px;
        line-height: 31px;

        color: #FFFFFF;
    }

    .item-text-10 {
        font-style: normal;
        font-weight: 600;
        font-size: 10px;
        line-height: 13px;

        letter-spacing: 0.07em;
        text-transform: uppercase;

        color: #FFFFFF;
    }

    .home-sites-slide__link {
        margin-top: 10px;
    }

    .home-sites-slide {
        padding-right: 16px;
    }

    .section-title-30 {
        font-style: normal;
        font-weight: normal;
        font-size: 30px;
        line-height: 37px;

        color: #212121;
    }

    .home-sites-slide__name {
        margin-bottom: 10px;
    }

    .home-sites-slider .slick-list {
        padding: 0 20% 0 0 !important;
    }

    .home-sites-slider .slick-next {
        right: 0px;
        width: 36px;
        height: 96px;
        background: #212121;
    }

    .home-sites-slider .slick-next:hover {
        background: #212121;
    }

    .home-sites-slider .slick-next:before {
        background-image: url('<?php echo get_stylesheet_directory_uri()?>/assets/image/icon-slider-arrow-right.svg');
        content: '';
        width: 30px;
        display: inline-block;
        height: 25px;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
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