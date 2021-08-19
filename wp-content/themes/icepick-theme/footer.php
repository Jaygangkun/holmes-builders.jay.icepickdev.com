<style>
	.house-gallery-col-wrap {
		position: relative;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
		padding: 30px;
		padding-top: 400px;
	}

	.house-gallery-col-wrap::before {
		content: '';
		position: absolute;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		background: linear-gradient(62.2deg, rgba(0, 0, 0, 0.9) -0.58%, rgba(0, 0, 0, 0) 59.53%);
	}

	.house-gallery-col-content {
		position: relative;
	}

	.house-item-link {
		margin-top: 20px;
	}

	.house-gallery-filter {
		background: #F2F2F2;
		padding: 15px 0px;
		font-style: normal;
		font-weight: normal;
		font-size: 12px;
		line-height: 15px;

		letter-spacing: 0.07em;
		text-transform: uppercase;

		color: #212121;
	}

	.house-gallery-list {
		display: flex;
		justify-content: space-between;
		flex-wrap: wrap;
	}

	.house-gallery-col {
		width: calc(50% - 8px);
		margin-bottom: 16px;
	}

	@media screen and (max-width: 992px) {

		.footer-col-right {
			justify-content: center;
			margin-top: 30px;
		}

		.footer-copyright {
			text-align: center;
		}

		.footer-col-left-wrap {
			display: block;
			text-align: center;
		}

		.footer-location {
			margin-top: 30px;
		}

		.footer-logo-img {
			margin-right: 0px;
		}
		

		.house-gallery-col-wrap {
			padding-top: 300px;
		}
	}

	@media screen and (max-width: 768px) {

		.home-sites .section-title-30 {
			text-align: center;
			margin-bottom: 20px;
		}

		.home-sites-link-wrap {
			text-align: center;
		}

		.item-text-25 {
			font-size: 20px;
		}

		.home-sites-slide-wrap {
			padding-top: 85%;
		}

		.link {
			padding: 10px 50px;
		}
	}

	@media screen and (max-width: 576px) {
		.container {
			width: 90%;
		}

		#menu-footer-menu {
			justify-content: center;
		}

		.item-title-28 {
			font-size: 24px;
		}

		.section-title-30 {
			font-size: 25px;
		}

		.footer-logo-img {
			width: 65px;
		}

		.house-gallery-col {
			width: 100%;
		}
	}
</style>
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
