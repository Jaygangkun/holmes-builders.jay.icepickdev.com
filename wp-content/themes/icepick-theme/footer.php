	<footer class="footer text-center" role="contentinfo">
	
		<div class="container-fluid">
			<div class="row g-0 py-5">
				<div class="col">
					<?=
					wp_nav_menu(array(
						'container_id' => 'footer-left',
						'menu' => __( 'Footer Left', 'primertheme' ),
						'theme_location' => 'footer-left',
						'container'      => false,
						'depth'          => 3,
						'menu_class'     => 'navbar-nav ms-auto mt-0 justify-content-lg-end',
						'walker' => new WP_Bootstrap_NavWalker(),
						'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
					));
					?>
				</div>
				<div class="col-auto d-none d-md-block">
					<img src="<?php the_field( 'footer_logo', 'option'); ?>" alt="">
				</div>
				<div class="col">
					<?=
					wp_nav_menu(array(
						'container_id' => 'footer-right',
						'menu' => __( 'Footer Right', 'primertheme' ),
						'theme_location' => 'footer-right',
						'container'      => false,
						'depth'          => 3,
						'menu_class'     => 'navbar-nav ms-auto mt-0',
						'walker' => new WP_Bootstrap_NavWalker(),
						'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
					));
					?>
				</div>
			</div>
			<div class="row g-0 bottom-row py-3">
				<div class="col-lg col-12">
					<div class="ps-lg-9"><?php the_field( 'copyright', 'option'); ?></div>
				</div>
				<div class="col-lg col-12">
					<?=
					wp_nav_menu(array(
						'container_id' => 'footer-bottom-right',
						'menu' => __( 'Footer Bottom Right', 'primertheme' ),
						'theme_location' => 'footer-bottom-right',
						'container'      => false,
						'depth'          => 3,
						'menu_class'     => 'navbar-nav ms-lg-5',
						'walker' => new WP_Bootstrap_NavWalker(),
						'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
					));
					?>
				</div>
			</div>
		</div>
	
	</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
		<!-- all js scripts are loaded in library/icepick.php -->
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->
