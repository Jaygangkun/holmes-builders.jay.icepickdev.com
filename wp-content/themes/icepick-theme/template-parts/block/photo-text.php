<?php /* Block Name: Photo Text Block */ ?>
<section class="photo-text">
	<div class="container">
    <?php if( have_rows('list') ): while ( have_rows('list') ) : the_row(); ?>
        <div class="row photo-text-row d-flex align-items-stretch justify-content-between photo-align-<?php the_sub_field('photo_align')?>">
            <div class="col-lg-6 photo-text-col-text">
                <?php 
                if(get_sub_field('title')) {
                    ?>
                    <h2 class="section-title-28"><?php the_sub_field('title')?></h2>
                    <?php
                }
                ?>
                <div class="desc-17"><?php the_sub_field('description')?></div>
            </div>
            <div class="col-lg-5 photo-text-col-photo">
                <?php
                $img = get_sub_field('photo');
                $img_url = '';
                if($img) {
                    $img_url = $img['url'];
                }
                ?>
                <div class="photo-text-col-photo-wrap" style="background-image: url(<?php echo $img_url?>)"></div>
            </div>
        </div>
    <?php endwhile; endif; ?>
    </div>
    
</section>