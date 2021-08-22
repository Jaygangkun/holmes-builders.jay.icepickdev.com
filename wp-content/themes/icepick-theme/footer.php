	<footer class="footer" role="contentinfo">
	
		<div class="container">
			<div class="row">
				<div class="col-lg-6 footer-col-left">
					<div class="footer-col-left-wrap">
						<?php
						$footer_logo = get_field('footer_logo', 'option');
						if($footer_logo) {
							?>
							<img class="footer-logo-img" src="<?php echo $footer_logo['url']?>" alt="<?php echo $footer_logo['alt']?>">
							<?php
						}
						?>
						<div class="footer-location item-text-15"><?php the_field('location', 'option')?></div>
					</div>
				</div>
				<div class="col-lg-6 footer-col-right">
					<div class="footer-col-right-wrap">
						<div class="footer-menu-links">
							<?php icepick_footer_links() ?>
						</div>
						<div class="footer-copyright item-text-14"><?php the_field('copyright', 'option')?></div>
					</div>
				</div>
			</div>
		</div>
	
	</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
		<!-- all js scripts are loaded in library/icepick.php -->
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->
