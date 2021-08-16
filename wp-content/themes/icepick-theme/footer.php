<style>
	.footer {
		background: #212121;
		padding: 40px 0px;
	}

	.footer-col-left-wrap {
		display: flex;
		align-items: center;
	}

	.footer-logo-img{
		width: 80px;
		margin-right: 30px;
	}

	.item-text-14 {
		font-style: normal;
		font-weight: normal;
		font-size: 14px;
		line-height: 23px;

		text-align: right;

		color: rgba(255, 255, 255, 0.8);
	}

	.item-text-15 {
		font-style: normal;
		font-weight: normal;
		font-size: 15px;
		line-height: 25px;
		color: #FFFFFF;
	}

	.footer-copyright {
		margin-top: 20px;
	}

	#menu-footer-menu {
		justify-content: flex-end;
	}

	#menu-footer-menu .menu-item a {
		text-decoration: none;
		font-style: normal;
		font-weight: normal;
		font-size: 12px;
		line-height: 15px;
		letter-spacing: 0.07em;
		text-transform: uppercase;

		color: #FFFFFF;
		text-transform: uppercase;
		margin: 0px 10px;
	}

	#menu-footer-menu .menu-item a:hover {
		text-decoration: none;
	}

	#menu-footer-menu .menu-item:last-of-type a {
		margin-right: 0px;
	}

	.footer-col-right {
		display: flex;
		align-items: center;
		justify-content: flex-end;
	}

	@media screen and (max-width: 992px) {
		.image-description {
			padding-top: 200px;
			padding-bottom: 40px;
		}

		.gallery-show-images {
			display: block;
		}

		.gallery-show-image1 {
			width: 100%;
		}

		.gallery-show-image2 {
			width: 100%;
			padding-top: 46%;
			margin-top: 20px;
		}

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

		.home-hero-nav__line {
			width: 230px;
		}
	}

	@media screen and (max-width: 768px) {
		.home-hero-slide-img-wrap {
			padding-top: 52%;
		}

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

		.gallery-show-link-col {
			text-align: center;
			order: 2;
		}

		.gallery-show-title-col {
			text-align: center;
		}

		.gallery-show .section-title-30 {
			text-align: center;
			margin-bottom: 20px;
		}

		.home-sites-slide-wrap {
			padding-top: 85%;
		}
	}

	@media screen and (max-width: 576px) {
		.container {
			width: 90%;
		}

		.image-description {
			padding-top: 150px;
		}

		#menu-footer-menu {
			justify-content: center;
		}

		.home-hero-nav__line {
			width: 150px;
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
