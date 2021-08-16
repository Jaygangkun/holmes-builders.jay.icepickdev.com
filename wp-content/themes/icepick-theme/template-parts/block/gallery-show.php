<?php /* Block Name: Gallery Show Block */ ?>
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