<?php get_header(); ?>


<?php if(have_posts()): the_post(); ?>

	<div class="wrap">
		<?php the_content(); ?>
	</div>
	
<?php endif; ?>

<?php get_footer(); ?>