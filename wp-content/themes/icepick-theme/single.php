<?php get_header(); ?>

  <div class="container">
  	<div class="row">
  		<div class="col-lg-9">
    		
  		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  			
          <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
        
            <header class="article-header">
        	
        	    <h1><?php the_title(); ?></h1>
              <p class="byline"><?php
                printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'icepicktheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), icepick_get_the_author_posts_link(), get_the_category_list(', '));
              ?></p>
        
            </header> <!-- end article header -->
        
            <section class="entry-content clearfix">
        	    <?php the_content(); ?>
            </section> <!-- end article section -->
        
            <footer class="article-footer">
        			<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'icepicktheme') . '</span> ', ', ', ''); ?></p>
            </footer> <!-- end article footer -->
        
            <?php comments_template(); ?>
        
          </article> <!-- end article -->
        
          <?php endwhile; ?>	
        
              <?php if (function_exists('icepick_page_navi')) { ?>
                  <?php icepick_page_navi(); ?>
              <?php } else { ?>
                  <nav class="wp-prev-next">
                      <ul class="clearfix">
              	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "icepicktheme")) ?></li>
              	        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "icepicktheme")) ?></li>
                      </ul>
                  </nav>
              <?php } ?>		
        
          <?php else : ?>
      					    
              <article id="post-not-found" class="hentry clearfix">
                  <header class="article-header">
              	    <h1><?php _e("Oops, Post Not Found!", "icepicktheme"); ?></h1>
              	</header>
                  <section class="entry-content">
              	    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "icepicktheme"); ?></p>
              	</section>
              	<footer class="article-footer">
              	    <p><?php _e("This is the error message in the index.php template.", "icepicktheme"); ?></p>
              	</footer>
              </article>
          
          <?php endif; ?>
          
  		</div><!-- end .col-lg-9 -->
  		
  		<div class="col-lg-3">
    		<?php get_sidebar(); ?>
  		</div><!-- end .col-lg-3 -->
  		
  	</div><!-- end .row -->
  </div><!-- end .container -->


<?php get_footer(); ?>
