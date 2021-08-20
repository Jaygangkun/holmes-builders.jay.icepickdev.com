<?php /* Block Name: Projects Block */ ?>
<section class="projects">
	<div class="container">
        <h2 class="section-title-30"><?php the_field('title')?></h2>
    </div>
    <div class="project-list">
    <?php if( have_rows('list') ): while ( have_rows('list') ) : the_row(); ?>
        <div class="project-list-col">
            <?php
            $photo = get_sub_field('photo');
            $photo_url = '';
            if($photo) {
                $photo_url = $photo['url'];
            }
            ?>
            <div class="project-list-col-wrap" style="background-image: url(<?php echo $photo_url?>)">
                <div class="project-list-col-content">
                    <h6 class="project__name item-text-25"><?php the_sub_field('name')?></h6>
                    <div class="project__location item-text-10"><?php the_sub_field('location')?></div>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
    </div>
</section>