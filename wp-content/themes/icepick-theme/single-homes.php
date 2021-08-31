<?php get_header(); ?>

<?php
$id = get_the_ID();

$feature_img = get_the_post_thumbnail_url($podcast_id, 'full');
?>

<div class="single-homes">
    <section class="single-homes-hero pt-10 pb-3" style="background-image:url(<?php echo $feature_img?>)">
        <div class="container position-relative mt-lg-8 mb-lg-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center mb-3">
                        <h3 class="single-homes-name mb-0"><?php the_title()?></h3>
                        <h6 class="single-homes-location mb-0 ms-3"><?php the_field('location2', $id)?></h6>
                    </div>
                    <p class=""><?php the_field('description', $id)?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="single-homes-development py-5">
        <div class="container">
            <h4 class="mb-4">Development Details</h4>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <p class="single-homes-development-label">Location:</p>
                    <div class="single-homes-development-value">
                        <?php the_field('location1', $id)?><br> 
                        <?php the_field('location2', $id)?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <p class="single-homes-development-label">Number of Homesites:</p>
                    <div class="single-homes-development-value">
                        <?php the_field('number_of_homesites', $id)?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <p class="single-homes-development-label">Home Type:</p>
                    <div class="single-homes-development-value">
                        <?php the_field('home_type', $id)?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <p class="single-homes-development-label">Community type:</p>
                    <div class="single-homes-development-value">
                        <?php the_field('community_type', $id)?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <p class="single-homes-development-label">Average lot sizes:</p>
                    <div class="single-homes-development-value">
                        <?php the_field('average_lot_sizes', $id)?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <p class="single-homes-development-label">Home Sizes:</p>
                    <div class="single-homes-development-value">
                        <?php the_field('home_sizes', $id)?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <p class="single-homes-development-label">Home Price:</p>
                    <div class="single-homes-development-value">
                        <?php the_field('home_price', $id)?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <p class="single-homes-development-label">School District:</p>
                    <div class="single-homes-development-value">
                        <?php the_field('school_district', $id)?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <p class="single-homes-development-label">HOA:</p>
                    <div class="single-homes-development-value">
                        <?php the_field('hoa', $id)?>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <p class="single-homes-development-label">Homeowner’s dues:</p>
                    <div class="single-homes-development-value">
                        <?php the_field('homeowners_dues', $id)?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="single-homes-community py-5">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6">
                    <?php 
                    $community_img = get_field('community_image', $id);
                    if($community_img){
                        ?>
                        <img class="single-homes-community__img w-100" src="<?php echo $community_img['url']?>" alt="<?php echo $community_img['alt']?>">
                        <?php
                    }
                    ?>

                </div>
                <div class="col-lg-6 ps-lg-5 pt-5">
                    <h3 class="">Community Info</h3>
                    <p class=""><?php the_field('community_description', $id)?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="single-homes-gallery pb-3">
        <div class="container">
            <h2 class="">Gallery</h2>
            <div class="row mt-4">
                <?php if( have_rows('gallery_list', $id) ): while ( have_rows('gallery_list', $id) ) : the_row(); ?>
                <?php
                $img = get_sub_field('image');
                $img_url = '';
                if($img) {
                    $img_url = $img['url'];
                }
                ?>
                <a class="col-lg-4 col-md-6 single-homes-gallery-col" href="<?php echo $img_url?>" rel="gallery">
                    <div class="single-homes-gallery-col-wrap" style="background-image:url(<?php echo $img_url?>)">

                    </div>
            </a>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>
    <?php
    $city_img = get_field('city_background');
    $city_img_url = '';
    if($city_img) {
        $city_img_url = $city_img['url'];
    }
    ?>
    <section class="single-homes-city pt-10 pb-3" style="background-image: url(<?php echo $city_img_url?>)">
        <div class="container position-relative mt-lg-8 mb-lg-5">
            <div class="row">
                <div class="col-lg-6">
                    <h3><?php the_field('city_name', $id)?></h3>
                    <p><?php the_field('city_description', $id)?></p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>