<?php /* Block Name: Galleries Block */ ?>
<div class="ui-template" style="display: none">
    <div id="template_filter_selected_item">
        <div class="filter-selected-item">
            <i class="fa fa-close"></i><span class="filter-selected-item__title"></span>
        </div>
    </div>
</div>
<section class="galleries">
    <div class="filter-container">
        <div class="container">
            <div class="filter-wrap">
                <div class="filter-select-wrap">
                    <span class="filter-title">Filter</span>
                    <?php
                    $styles = get_terms( array(
                        'taxonomy' => 'gallery_style',
                        'hide_empty' => false
                    ) );
                    ?>
                    <select id="style_select" class="filter-select">
                        <option value="">None</option>
                        <?php
                        foreach( $styles as $style ) {
                            ?>
                            <option value="<?php echo $style->term_id?>"><?php echo $style->name?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="filter-selected-list" id="filter_selected_list">
                </div>
            </div>
        </div>
    </div>
    <div class="galleries-list" id="galleries_list">
        <?php
        $galleries = get_posts(array(
			'post_type' => 'gallery',
			'numberposts' => -1,
            'order_by' => 'date',
            'sort_order' => 'desc'
		));

        foreach($galleries as $gallery){
            $image = get_the_post_thumbnail_url($gallery->ID, 'full');
			?>
            <div class="galleries-col">
                <div class="galleries-col-wrap" style="background-image:url(<?php echo $image?>)">
                    <div class="galleries-col-content">
                        <div class="item-text-25"><?php echo get_the_title($gallery->ID)?></div>
                        <div class="item-text-10"><?php the_field('location', $gallery->ID)?></div>
                        <?php
                        $link = get_field('link', $gallery->ID);
                        if($link) {
                            ?>
                            <a class="btn btn-light mt-3" href="<?php echo $link['url']?>" target="<?php echo $link['target']?>"><?php echo $link['title']?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
		}
        ?>
    </div>
</section>