<?php get_header(); ?>

<?php
$id = get_the_ID();

$feature_img = get_the_post_thumbnail_url($id, 'full');
?>

<div class="single-gallery">
    <section class="single-gallery-hero pt-10 pb-3" style="background-image:url(<?php echo $feature_img?>)">
        <div class="container position-relative mt-lg-8 mb-lg-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <h6 class="single-gallery-static mb-0">See More Of</h6>
                        <h3 class="single-gallery-title mb-0"><?php the_title()?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        $images = get_field('gallery');
        $size = 'full';
        if( $images ): 
    ?>
            <section class="single-gallery-list pb-3">
                <div class="container">
                    <div class="row mt-4">
                        <?php foreach( $images as $image ): ?>
                            <?php
                            $img_url = $image['url'];
                            ?>
                            <a class="col-lg-4 col-md-6 single-gallery-list-col" href="<?php echo $img_url?>" rel="gallery">
                                <div class="single-gallery-list-col-wrap" style="background-image:url(<?php echo $img_url?>)">
                                </div>
                            </a>
                        <?php endforeach;?>      
                    </div>
                </div>
            </section>
        <?php endif; ?>    
</div>

<?php get_footer(); ?>