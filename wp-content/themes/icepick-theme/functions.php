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