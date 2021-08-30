<?php /* Block Name: Navigations Block */ ?>

<section class="navigations">
	<div class="container">
        <div class="navigations-wrap">
        <?php
        $index = 0;
        ?>
        <?php if( have_rows('list') ): while ( have_rows('list') ) : the_row(); ?>
            <?php
            $link = get_sub_field('link');
            if($link) {
                ?>
                <div class="navigation-link-wrap">
                    <span class="navigation-link <?php echo $index == 0 ? "active" : "" ?>" href="<?php echo $link['url']?>" target="<?php echo $link['target']?>"><?php echo $link['title']?></span>
                </div>
                <?php
            }
            $index ++;
            ?>
        <?php endwhile; endif; ?>
        </div>
    </div>
</section>