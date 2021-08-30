<?php
/*
  Developed by: IcePick Co
  URL: http://icepick.co
*/


$a = file_get_contents( dirname(__FILE__) . '/../assets/scss/frame/colors.scss');
$re = '/\"(.*?)":(.*?),/';
preg_match_all($re, $a, $matches);
$palette = array_combine( $matches[1], $matches[2] );

array_walk($palette, function(&$v,$k) {
	
	$v = [
		'name' => ucfirst( str_replace('-', ' ', $k) ),
		'color' => $v,
		'slug' => $k
	];
	
 });


add_theme_support( 'editor-color-palette', $palette );


// we're firing all out initial functions at the start
add_action('after_setup_theme','icepick_ahoy', 15);

function icepick_ahoy() {

    // launching operation cleanup
    add_action('init', 'icepick_head_cleanup');
    // remove WP version from RSS
    add_filter('the_generator', 'icepick_rss_version');
    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'icepick_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action('wp_head', 'icepick_remove_recent_comments_style', 1);
	//
	//add_action('wp_head', 'icepick_add_style_schema', 20);	
    // clean up gallery output in wp
    add_filter('gallery_style', 'icepick_gallery_style');

    // enqueue base scripts and styles
    add_action('wp_enqueue_scripts', 'icepick_scripts_and_styles', 999);
    // ie conditional wrapper
    add_filter( 'style_loader_tag', 'icepick_ie_conditional', 10, 2 );

    // launching this stuff after theme setup
    add_action('after_setup_theme','icepick_theme_support', 20);
    // adding sidebars to Wordpress (these are created in functions.php)
    add_action( 'widgets_init', 'icepick_register_sidebars' );
    // adding the icepick search form (created in functions.php)
    add_filter( 'get_search_form', 'icepick_wpsearch' );

    // cleaning up random code around images
    add_filter('the_content', 'icepick_filter_ptags_on_images');
    // cleaning up excerpt
    add_filter('excerpt_more', 'icepick_excerpt_more');

}


/*********************
Admin necessities
*********************/
	
add_action( 'after_setup_theme', function(){
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
  
	// Enqueue editor styles.
	add_editor_style('dist/bundle.style.css' );	
} );


add_action("admin_enqueue_scripts", function(){
	// Admin JS
	wp_enqueue_script("icepick-script", get_template_directory_uri() . "/dist/bundle.admin.scripts.js", [], "1.0.0", true);
});


add_action('admin_head', function(){
	// Admin CSS
	wp_enqueue_style( 'icepick-stylesheet',  get_stylesheet_directory_uri() . '/dist/bundle.admin.style.css', array(), false, false);
	
	icepick_add_style_schema();
});



/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function icepick_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
    // remove WP version from css
    //add_filter( 'style_loader_src', 'icepick_remove_wp_ver_css_js', 9999 );
    // remove Wp version from scripts
    //add_filter( 'script_loader_src', 'icepick_remove_wp_ver_css_js', 9999 );
	


} /* end icepick head cleanup */


// parse schema.json and add editor colors to theme
function icepick_add_style_schema(){
	global $palette;
	echo '<style type="text/css">' . 
		implode(' ', array_column($palette, 'color_css') ) . 
		' ' .
		implode(' ', array_column($palette, 'bg_css') ) .
		'</style>';
}


// remove WP version from RSS
function icepick_rss_version() { return ''; }

// remove WP version from scripts
function icepick_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS for recent comments widget
function icepick_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function icepick_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// remove injected CSS from gallery
function icepick_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function icepick_scripts_and_styles() {
  if (!is_admin()) {

	$version = file_get_contents( dirname(__FILE__) . '/../dist/build');  


    // register main stylesheet
    wp_register_style( 'icepick-stylesheet', get_stylesheet_directory_uri() . '/dist/bundle.style.css', array(), $version, 'all' );

	// slick stylesheet
    wp_register_style( 'slick-stylesheet', get_stylesheet_directory_uri() . '/assets/scss/lib/slick.css', array(), '', 'all' );
	wp_register_style( 'slick-theme-stylesheet', get_stylesheet_directory_uri() . '/assets/scss/lib/slick-theme.css', array(), '', 'all' );

	// fancybox
	wp_register_style( 'fancybox-stylesheet', get_stylesheet_directory_uri() . '/assets/scss/lib/jquery.fancybox-1.3.4.css', array(), '', 'all' );

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    //adding scripts file in the footer
    wp_register_script( 'icepick-js', get_stylesheet_directory_uri() . '/dist/bundle.scripts.js', array( 'jquery' ), $version, true );

	// slick
	wp_register_script( 'slick-js', get_stylesheet_directory_uri() . '/assets/js/lib/slick.min.js', array( 'jquery' ), '', true );

	// fancybox
	wp_register_script( 'fancybox-mousewheel-js', get_stylesheet_directory_uri() . '/assets/js/lib/jquery.mousewheel-3.0.4.pack.js', array( 'jquery' ), '', true );
	wp_register_script( 'fancybox-js', get_stylesheet_directory_uri() . '/assets/js/lib/jquery.fancybox-1.3.4.js', array( 'jquery' ), '', true );

    // enqueue styles and scripts
	wp_enqueue_style( 'slick-stylesheet' );
	wp_enqueue_style( 'slick-theme-stylesheet' );
	wp_enqueue_style( 'fancybox-stylesheet' );
    wp_enqueue_style( 'icepick-stylesheet' );

	wp_enqueue_script( 'slick-js' );
	wp_enqueue_script( 'fancybox-mousewheel-js' );
	wp_enqueue_script( 'fancybox-js' );
    wp_enqueue_script( 'icepick-js' );

  }
}

// adding the conditional wrapper around ie stylesheet
// source: http://code.garyjones.co.uk/ie-conditional-style-sheets-wordpress/
function icepick_ie_conditional( $tag, $handle ) {
	if ( 'icepick-ie-only' == $handle )
		$tag = '<!--[if lt IE 9]>' . "\n" . $tag . '<![endif]-->' . "\n";
	return $tag;
}

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function icepick_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support('post-thumbnails');
	
	// woocommerce theme support
	add_theme_support( 'woocommerce' );

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'icepicktheme' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'icepicktheme' ) // secondary nav in footer
		)
	);
} /* end icepick theme support */


/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function icepick_main_nav() {
	
    wp_nav_menu(array(
    	'container_id' => 'primary-menu',
    	'menu' => __( 'The Main Menu', 'icepicktheme' ),
    	'theme_location' => 'main-nav',
    	'container'      => false,
    	'depth'          => 3,
    	'menu_class'     => 'navbar-nav ms-auto mt-0 align-items-lg-center',
    	'walker' => new WP_Bootstrap_NavWalker(),
    	'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
	));
	
} /* end icepick main nav */

// the footer menu (should you choose to use one)
function icepick_footer_links() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links', 'icepicktheme' ),   // nav name
    	'menu_class' => 'nav footer-nav clearfix',      // adding custom nav class
    	'theme_location' => 'footer-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
	));
} /* end icepick footer link */

/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using icepick_related_posts(); )
function icepick_related_posts() {
	echo '<ul id="icepick-related-posts">';
	global $post;
	$tags = wp_get_post_tags($post->ID);
	if($tags) {
		foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
        $args = array(
        	'tag' => $tag_arr,
        	'numberposts' => 5, /* you can change this to show more */
        	'post__not_in' => array($post->ID)
     	);
        $related_posts = get_posts($args);
        if($related_posts) {
        	foreach ($related_posts as $post) : setup_postdata($post); ?>
	           	<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
	        <?php endforeach; }
	    else { ?>
            <?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'icepicktheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_query();
	echo '</ul>';
} /* end icepick related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function icepick_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav class="page-navigation"><ol class="icepick_page_navi clearfix">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __( "First", 'icepicktheme' );
		echo '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	echo '<li class="bpn-prev-link">';
	previous_posts_link('<<');
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="bpn-current">'.$i.'</li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="bpn-next-link">';
	next_posts_link('>>');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __( "Last", 'icepicktheme' );
		echo '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	echo '</ol></nav>'.$after."";
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function icepick_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function icepick_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a href="'. get_permalink($post->ID) . '" title="Read '.get_the_title($post->ID).'">Read more &raquo;</a>';
}

/*
 * This is a modified the_author_posts_link() which just returns the link.
 *
 * This is necessary to allow usage of the usual l10n process with printf().
 */
function icepick_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}




/************* THUMBNAIL SIZE OPTIONS *************/


// Thumbnail sizes
add_image_size( 'icepick-1400', 1400, 0, true );



/************* ACTIVE SIDEBARS ********************/


// Sidebars & Widgetizes Areas
function icepick_register_sidebars() {
  
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'icepicktheme'),
		'description' => __('The first (primary) sidebar.', 'icepicktheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

}




/************* COMMENT LAYOUT *********************/

		
// Comment Layout
function icepick_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php 
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/ 
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'icepicktheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'icepicktheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'icepicktheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				   <div class="alert info">
					  <p><?php _e('Your comment is awaiting moderation.', 'icepicktheme') ?></p>
				  </div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!


/************* SEARCH FORM LAYOUT *****************/


// Search Form
function icepick_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __('Search', 'icepicktheme') . '</label>
	<div class="form-group">
	  <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search...','icepicktheme').'" />
	</div>
	<input type="submit" class="btn btn-primary" id="searchsubmit" value="'. esc_attr__('Search') .'" />
	</form>';
	return $form;
} // don't remove this bracket!


/************* IMAGE FORMATTING *****************/


// Allow SVG Upload to WP
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');


/************* ACF *****************/


// Add ACF Options Page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

