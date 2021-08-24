<?php /* Block Name: Home Sites Block */ ?>
<section class="home-sites">
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