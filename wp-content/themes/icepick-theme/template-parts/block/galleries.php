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
<script>
	var selected_filters = [];
	(function($){
		$(document).ready(function() {

            function drawFilters(){
                $('#filter_selected_list').empty();
                for(var index = 0; index < selected_filters.length; index ++){
                    var filter_item = $('#template_filter_selected_item').clone();
                    $(filter_item).find('.filter-selected-item__title').text(selected_filters[index].title);
                    $(filter_item).find('.filter-selected-item').attr('filter', selected_filters[index].value);
                    $('#filter_selected_list').append($(filter_item).html())
                }

                processFilter();
            }

            function processFilter() {
                $.ajax({
                    url: wp_admin_url + '',
                    type: 'post',
                    data:{
                        action: 'get_galleries',
                        filters: selected_filters
                    },
                    success: function(response){
                        $('#galleries_list').html(response);
                    }
                })
            }
            $(document).on('change', '#style_select', function(){
                let filter_value = $(this).val();
                let filter_title = $(this).find('option:selected').text();

                if(filter_value == ''){
                    return;
                }
                
                let found_filters = selected_filters.filter(function( filter ) {
                    return filter.value === filter_value;
                });

                if(found_filters.length == 0){
                    selected_filters.push({
                        value: filter_value,
                        title: filter_title
                    });
                    drawFilters();
                }
            })

            $(document).on('click', '.filter-selected-item i', function(){
                let filter_value = $(this).parents('.filter-selected-item').attr('filter');
                
                let filtered_filters = selected_filters.filter(function( filter ) {
                    return filter.value !== filter_value;
                });

                if(filtered_filters.length != selected_filters.length){
                    selected_filters = filtered_filters;
                    drawFilters();
                }
            })
		})
	})(jQuery)
</script>