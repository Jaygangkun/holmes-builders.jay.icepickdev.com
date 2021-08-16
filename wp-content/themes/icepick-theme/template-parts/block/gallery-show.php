<?php /* Block Name: Gallery Show Block */ ?>
<style>
    .gallery-show {
        padding: 50px 0px;
    }

	.gallery-show-images {
        display: flex;
        align-items: stretch;
        justify-content: space-between;
    }

    .gallery-show-image1 {
        width: calc(35% - 20px);
        height: 0px;
        padding-top: 46%;
        position: relative;
    }

    .gallery-show-image1-wrap {
        position: absolute;
        left: 0px;
        width: 100%;
        top: 0px;
        height: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .gallery-show-image2 {
        width: calc(65% - 20px);
        position: relative;
    }

    .gallery-show-image2-wrap {
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .gallery-show .section-title-30 {
        text-align: right;
    }

    .gallery-show-images {
        margin-top: 20px;
    }
</style>
<section class="gallery-show">
	<div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <?php
            $link = get_field('link');
            if($link) {
                ?>
                <div class="col-lg-3 col-md-5 gallery-show-link-col">
                    <a class="link link-black" href="<?php echo $link['url']?>" target="<?php echo $link['target'] ?>"><?php echo $link['title']?></a>
                </div>
                <?php
            }
            ?>
            <div class="col-lg-9 col-md-7 gallery-show-title-col">
                <h2 class="section-title-30"><?php the_field('title')?></h2>
            </div>
        </div>
        <div class="gallery-show-images">
            <?php
            $img1 = get_field('image1');
            $img1_url = '';
            if($img1) {
                $img1_url = $img1['url'];
            }
            ?>
            <div class="gallery-show-image1">
                <div class="gallery-show-image1-wrap" style='background-image:url(<?php echo $img1_url?>)'>
                </div>
            </div>
            <?php
            $img2 = get_field('image2');
            $img2_url = '';
            if($img2) {
                $img2_url = $img2['url'];
            }
            ?>
            <div class="gallery-show-image2">
                <div class="gallery-show-image2-wrap" style="background-image:url(<?php echo $img2_url?>)">
                </div>
            </div>
        </div>
    </div>
    
</section>
<script>
	(function($){
		$(document).ready(function() {
			
		})
	})(jQuery)
</script>