<?php /* Block Name: Homes Block */ ?>
<div class="ui-template" style="display: none">
    <div id="template_filter_selected_item">
        <div class="filter-selected-item">
            <i class="fa fa-close"></i><span class="filter-selected-item__title"></span>
        </div>
    </div>
</div>
<section class="homes">
	<div class="filter-container">
        <div class="container">
            <div class="filter-wrap">
                <div class="filter-select-wrap">
                    <span class="filter-title">Filter</span>
                    <?php
                    $styles = get_terms( array(
                        'taxonomy' => 'style',
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
    <div class="homes-list" id="homes_list">
        <?php
        $homes = get_posts(array(
			'post_type' => 'homes',
			'numberposts' => -1,
            'order_by' => 'date',
            'sort_order' => 'desc'
		));

        foreach($homes as $home){
            $image = get_the_post_thumbnail_url($home->ID, 'full');
            $link = get_permalink($home->ID);

			?>
            <div class="home-col">
                <div class="home-col-wrap" style="background-image:url(<?php echo $image?>)">
                    <div class="container position-relative">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-lg-6 col-md-8">
                                <div class="home__name section-title-30 mb-3"><?php echo get_the_title($home->ID)?></div>
                                <div class="home__location item-text-10"><?php the_field('location2', $home->ID)?></div>
                            </div>
                            <div class="col-lg-3 col-md-4 mt-3">
                                <div class="home__price item-text-10 mb-3"><?php the_field('home_price', $home->ID)?></div>
                                <a class="btn btn-light" href="<?php echo $link?>">View Community</a>
                            </div>
                        </div>
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
                        action: 'get_homes',
                        filters: selected_filters
                    },
                    success: function(response){
                        $('#homes_list').html(response);
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