<?php
/*
  Author: Icepick Co
  URL: htp://icepick.co
*/


/************* INCLUDE NEEDED FILES ***************/


/*
1. library/icepick.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/theme.php'); // if you remove this, icepick will break
require_once('library/blocks.php'); // ACF Gutenberg Blocks
require_once('library/wp_bootstrap_navwalker.php'); // Bootstrap Nav Walker

/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default

/*
4. library/translation/translation.php
    - adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default


function icepick_group_wrapper( $block_content, $block ) {	

	if ( $block['blockName'] !== 'core/group' ) return $block_content;

	$className = isset($block['attrs']['className']) ? $block['attrs']['className'] : '';

	$style = '';
	if( isset($block['attrs']['mediaUrl']) ){
		
		$style = "style=\"background-image:url({$block['attrs']['mediaUrl']});\"";
		
	}
	
//	echo '<pre>' . var_export( $block, true ) . '</pre>';
		
	$container = 'container-fluid';
	$row	   = 'row';
	$col	   = 'col';	
				
	if( isset($block['attrs']['builtClasses']) )
		extract($block['attrs']['builtClasses']);	

	return "<div class=\"{$container}\">
				<div class=\"{$row}\">
					<div class=\"{$col}\">
						<div $style class=\"$className\">
						{$block_content}
						</div>
					</div>
				</div>
			</div>";

	
	return $block_content;
}
 
add_filter( 'render_block', 'icepick_group_wrapper', 10, 2 );

function getHomes() {
	
	if(isset($_POST['filters']) && count($_POST['filters']) > 0){
		$filters = $_POST['filters'];
		$tax_query = array();
		foreach($filters as $filter){
			$tax_query[] = array(
				'taxonomy' => 'style',
				'field' => 'term_id',
				'terms' => $filter['value'],
			);
		}
		$homes = get_posts(array(
			'post_type' => 'homes',
			'numberposts' => -1,
			'order_by' => 'date',
			'sort_order' => 'desc',
			'tax_query' => $tax_query
		));
	}
	else{
		$homes = get_posts(array(
			'post_type' => 'homes',
			'numberposts' => -1,
			'order_by' => 'date',
			'sort_order' => 'desc'
		));
	}
	

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

	die();
}

add_action('wp_ajax_get_homes', 'getHomes');
add_action('wp_ajax_nopriv_get_homes', 'getHomes');