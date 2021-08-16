<?php /* Block Name: Process Block */ ?>
<section class="process">
    <div class="process-desc">
        <div class="container">
            <div class="desc-17"><?php the_field('description')?></div>
        </div>
    </div>
    <?php if( have_rows('steps') ): while ( have_rows('steps') ) : the_row(); ?>
        <div class="process-step-container background-<?php the_sub_field('background')?>">
            <div class="container">
                <div class="row process-step-row d-flex justify-content-between align-items-center content-align-<?php the_sub_field('text_content_align') ?>">
                    <div class="col-lg-6 process-step-col-text">
                        <div class="item-text-12"><?php the_sub_field('step_text') ?></div>
                        <h2 class="section-title-28"><?php the_sub_field('title')?></h2>
                        <div class="desc-17"><?php the_sub_field('description')?></div>
                    </div>
                   
                    <?php
                    if(get_sub_field('has_image') == 'true') {
                        ?>
                        <div class="col-lg-4 process-step-col-img">
                            <div class="process-step-col-img-wrap" style="background-image: url(<?php echo $img['url']?>)"></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
    
</section>