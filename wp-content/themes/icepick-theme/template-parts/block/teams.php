<?php /* Block Name: Teams Block */ ?>
<section class="teams">
	<div class="container">
        <h2 class="section-title-28"><?php the_field('title')?></h2>
    </div>
    <div class="team-members">
    <?php if( have_rows('members') ): while ( have_rows('members') ) : the_row(); ?>
        <div class="team-member-col">
            <?php
            $photo = get_sub_field('photo');
            $photo_url = '';
            if($photo) {
                $photo_url = $photo['url'];
            }
            ?>
            <div class="team-member-col-wrap" style="background-image: url(<?php echo $photo_url?>)">
                <div class="team-member-col-content">
                    <h6 class="team-member-name item-text-25"><?php the_sub_field('name')?></h6>
                    <div class="team-member-role item-text-10"><?php the_sub_field('role')?></div>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
    </div>
</section>