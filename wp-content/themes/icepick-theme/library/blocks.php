<?php

/**************** Gutenberg Block Custom Category ****************/

function custom_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'custom',
				'title' => __( 'Custom', 'custom' ),
			),
		)
	);
}

add_filter( 'block_categories', 'custom_category', 10, 2);




/**************** Loading ACF into Gutenberg ****************/




// Render Callback

function my_acf_block_render_callback( $block ) {
	
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/{$slug}.php") );
	}
}


// Registering ACF Blocks

add_action('acf/init', 'my_acf_init');

function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
  	
		acf_register_block(array(
			'name'				=> 'test-block',
			'title'				=> __('Test Block'),
			'description'		=> __('A dummy starter block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'slides',
			'keywords'			=> array( 'test' )
		));
		
		acf_register_block(array(
			'name'				=> 'home-hero',
			'title'				=> __('Home Hero Block'),
			'description'		=> __('A dummy starter block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'slides',
			'keywords'			=> array( 'test' )
		));

		acf_register_block(array(
			'name'				=> 'home-sites',
			'title'				=> __('Home Sites Block'),
			'description'		=> __('A dummy starter block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'slides',
			'keywords'			=> array( 'test' )
		));

		acf_register_block(array(
			'name'				=> 'navigations',
			'title'				=> __('Navigations Block'),
			'description'		=> __('A dummy starter block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'slides',
			'keywords'			=> array( 'test' )
		));

		acf_register_block(array(
			'name'				=> 'teams',
			'title'				=> __('Teams Block'),
			'description'		=> __('A dummy starter block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'slides',
			'keywords'			=> array( 'test' )
		));

		acf_register_block(array(
			'name'				=> 'testimonials',
			'title'				=> __('Testimonials Block'),
			'description'		=> __('A dummy starter block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'slides',
			'keywords'			=> array( 'test' )
		));

		acf_register_block(array(
			'name'				=> 'galleries',
			'title'				=> __('Galleries Block'),
			'description'		=> __('A dummy starter block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'slides',
			'keywords'			=> array( 'test' )
		));

		acf_register_block(array(
			'name'				=> 'projects',
			'title'				=> __('Projects Block'),
			'description'		=> __('A dummy starter block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'slides',
			'keywords'			=> array( 'test' )
		));

		acf_register_block(array(
			'name'				=> 'homes',
			'title'				=> __('Homes Block'),
			'description'		=> __('A dummy starter block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'slides',
			'keywords'			=> array( 'test' )
		));
	}
}
  
?>