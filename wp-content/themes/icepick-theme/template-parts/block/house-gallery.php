<?php /* Block Name: House Gallery Block */ ?>
<section class="house-gallery">
	<div class="house-gallery-filter">
        <div class="container">
            <span class="">Filter</span>
        </div>
    </div>
    <div class="house-gallery-list">
        <?php
        $houses = get_posts(array(
			'post_type' => 'house',
			'numberposts' => -1,
            'order_by' => 'date',
            'sort_order' => 'desc'
		));

        foreach($houses as $house){
            $image = get_field('image', $house->ID);
            $image_url = '';
            if($image) {
                $image_url = $image['url'];
            }
			?>
            <div class="house-gallery-col">
                <div class="house-gallery-col-wrap" style="background-image:url(<?php echo $image_url?>)">
                    <div class="house-gallery-col-content">
                        <div class="item-text-25"><?php the_field('name', $house->ID)?></div>
                        <div class="item-text-10"><?php the_field('location', $house->ID)?></div>
                        <?php
                        $link = get_field('link', $house->ID);
                        if($link) {
                            ?>
                            <a class="house-item-link link" href="<?php echo $link['url']?>" target="<?php echo $link['target']?>"><?php echo $link['title']?></a>
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
<script>
	(function($){
		$(document).ready(function() {
			
		})
	})(jQuery)
</script>