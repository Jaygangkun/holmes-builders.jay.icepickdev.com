<style>
	.gallery-show {
        padding: 50px 0px;
    }

	.gallery-show-images {
        display: flex;
        align-items: stretch;
        justify-content: space-between;
    }

    .gallery-show-image1 {
        width: calc(35% - 20px);
        height: 0px;
        padding-top: 46%;
        position: relative;
    }

    .gallery-show-image1-wrap {
        position: absolute;
        left: 0px;
        width: 100%;
        top: 0px;
        height: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .gallery-show-image2 {
        width: calc(65% - 20px);
        position: relative;
    }

    .gallery-show-image2-wrap {
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .gallery-show .section-title-30 {
        text-align: right;
    }

    .gallery-show-images {
        margin-top: 20px;
    }


	.general-hero {
        padding-top: 300px;
        padding-bottom: 100px;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .general-hero:before {
		content: '';
        position: absolute;
        left: 0px;
        width: 100%;
        top: 0px;
        height: 100%;
        background: linear-gradient(74.95deg, rgba(0, 0, 0, 0.56) 32.98%, rgba(0, 0, 0, 0) 137.15%);
    }

	

	.general-hero-content {
		max-width: 330px;
	}

	.home-sites {
        padding: 50px 0px;
    }


    .home-sites-slider {
        margin-top: 20px;
    }

    .home-sites-slide-wrap {
        position: relative;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        width: 100%;
        height: 0px;
        padding-top: 135%;
    }

    .home-sites-slide-wrap::before {
        content: '';
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background: linear-gradient(13.27deg, rgba(0, 0, 0, 0.56) 3.67%, rgba(0, 0, 0, 0) 56.95%);
    }

    .home-sites-slide-info {
        position: absolute;   
        left: 30px;
        right: 30px;
        bottom: 30px;
    }

    .home-sites-slide__link {
        margin-top: 10px;
    }

    .home-sites-slide {
        padding-right: 16px;
    }

    

    .home-sites-slide__name {
        margin-bottom: 10px;
    }

    .home-sites-slider .slick-list {
        padding: 0 20% 0 0 !important;
    }

    .home-sites-slider .slick-next {
        right: 0px;
        width: 36px;
        height: 96px;
        background: #212121;
    }

    .home-sites-slider .slick-next:hover {
        background: #212121;
    }

    .home-sites-slider .slick-next:before {
        background-image: url('<?php echo get_stylesheet_directory_uri()?>/assets/image/icon-slider-arrow-right.svg');
        content: '';
        width: 30px;
        display: inline-block;
        height: 25px;
        background-repeat: no-repeat;
        background-position: center;
    }

	.image-description {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        padding-top: 400px;
        padding-bottom: 60px;
        position: relative;
        margin-bottom: 10px;
    }

	.image-description.valign-middle {
		padding-top: 180px;
		padding-bottom: 180px;
	}
    
    .image-description::before {
        content: '';
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background: linear-gradient(81.17deg, rgba(26, 26, 26, 0.86) 2.16%, rgba(34, 34, 34, 0.47) 53.39%, rgba(62, 63, 65, 0) 99.55%);
    }

    .image-description-link {
        margin-top: 30px;
    }

    .image-description .section-title-28 {
        margin-bottom: 20px;
    }

	

	.navigations {
		background: #F2F2F2;
	}

	.navigation-link {
		display: inline-block;
		cursor: pointer;
		font-style: normal;
		font-weight: normal;
		font-size: 12px;
		line-height: 15px;

		text-align: center;
		letter-spacing: 0.07em;
		text-transform: uppercase;

		color: #212121;
		position: relative;
		padding: 15px 10px;
	}

	.navigation-link:first-of-type {
		padding-left: 0px;
	}

	.navigation-link.active::after {
		content: '';
		position: absolute;
		left: 0px;
		width: 100%;
		bottom: 0px;
		height: 1px;
		background: #212121;
	}

	.photo-text {
		padding: 100px 0px;
	}

	.photo-text-row {
		margin-bottom: 80px;
	}

	.photo-text-row:last-of-type {
		margin-bottom: 0px;
	}

	.photo-align-left .photo-text-col-text {
		order: 2;
	}

	.photo-text-col-photo-wrap {
		background-position: center;
		background-size: cover;
		background-repeat: no-repeat;
		position: relative;
		width: 100%;
		padding-top: 125%;
		height: 0px;
	}

	.photo-text-col-photo-wrap::before {
		content: '';
		position: absolute;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		background: linear-gradient(81.17deg, rgba(26, 26, 26, 0.86) 2.16%, rgba(34, 34, 34, 0.47) 53.39%, rgba(62, 63, 65, 0) 99.55%)
	}

	.photo-text .section-title-28 {
		color: #212121;
	}

	.photo-text .desc-17 {
		color: #212121;
	}

	.team-member-col-wrap {
		position: relative;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
		width: 100%;
		padding-top: 125%;
		height: 0px;
	}

	.team-member-col-wrap::before {
		content: '';
		position: absolute;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		background: linear-gradient(13.27deg, rgba(0, 0, 0, 0.56) 3.67%, rgba(0, 0, 0, 0) 56.95%), rgba(0, 0, 0, 0.3);
	} 

	.team-member-col-content {
		position: absolute;
		left: 25px;
		bottom: 10px;
	}

	.teams {
		padding-top: 60px;
		background: #F2F2F2;
	}

	.team-members {
		margin-top: 60px;
		display: flex;
		justify-content: space-between;
		flex-wrap: wrap;
	}

	.team-member-col {
		width: calc(25% - 5px);
		margin-bottom: 10px;
	}

	.teams .section-title-28 {
		color: #212121;
	}

	.testimonial-note {
		margin-bottom: 50px;
	}

	.testimonial-name {
		margin-bottom: 10px;
	}

	.testimonials-slider {
		margin-top: 80px;
	}

	.testimonials {
		background: #393939;
		padding-top: 80px;
		padding-bottom: 200px;
		position: relative;
	}

	.testimonials .section-title-28 {
		text-align: center;
	}

	.testimonials-nav {
		position: absolute;
		bottom: 50px;
		left: 50%;
		transform: translateX(-50%);
		width: 60%;
		max-width: 400px;
	}

	.testimonials-wrap {
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: space-between;
	}

	.testimonials-nav__line {
		flex-grow: 1;
		margin-right: 20px;
		width: 100%;
		height: 1px;
		background: #ffffff;
	}

	.testimonials-nav__numb-current {
		font-style: normal;
		font-weight: 500;
		font-size: 18px;
		line-height: 18px;

		color: #FFFFFF;
	}

	.testimonials-nav__numb-total {
		font-style: normal;
		font-weight: normal;
		font-size: 14px;
		line-height: 18px;

		color: #FFFFFF;
		margin-left: -4px;
	}

	.testimonials-nav__numb {
		flex-shrink: 0;
	}

	.process-desc {
		padding: 90px 0px;
		background: #F2F2F2;
	}

	.process-step-row {
		padding: 100px 0px;
	}

	.process-step-container {
		background: #ffffff;
	}

	.process .item-text-12 {
		color: #3E3E3C;
		text-align: left;
	}

	.process .section-title-28 {
		color: #212121;
	}

	.process .desc-17 {
		color: #212121;
	}

	.process .background-black.process-step-container {
		background: linear-gradient(81.17deg, rgba(26, 26, 26, 0.92) 2.16%, rgba(34, 34, 34, 0.61) 99.55%);
	}

	.process .background-black .item-text-12 {
		color: #ffffff;
	}

	.process .background-black .section-title-28 {
		color: #ffffff;
	}

	.process .background-black .desc-17 {
		color: #ffffff;
	}

	.process .process-step-col-img-wrap {
		width: 100%;
		padding-top: 100%;
		height: 0px;
		background: linear-gradient(81.17deg, rgba(26, 26, 26, 0.86) 2.16%, rgba(34, 34, 34, 0.47) 53.39%, rgba(62, 63, 65, 0) 99.55%), #858480;
	}

	.process .content-align-right .process-step-col-text {
		order: 2;
	}

	.process .content-align-right .process-step-col-img {
		order: 1;
	}

	.process .content-align-center .process-step-col-text {
		margin: auto;
	}

	.background-black .process-step-col-img-wrap {
		display: none;
	}

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
		.image-description {
			padding-top: 200px;
			padding-bottom: 40px;
		}

		.image-description.valign-middle {
			padding-top: 100px;
			padding-bottom: 100px;
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

		.general-hero {
			padding-top: 200px;
			padding-bottom: 60px;
		}

		.photo-text {
			padding: 60px 0px;
		}

		.photo-text-col-photo-wrap {
			width: 60%;
			padding-top: 70%;
			height: 0px;
			margin: auto;
			margin-top: 30px;
			max-width: 400px;
		}

		.photo-align-left .photo-text-col-text {
			order: 1;
		}

		.photo-align-left .photo-text-col-photo {
			order: 2;
		}

		.team-member-col {
			width: calc(50% - 5px);
		}

		.team-members {
			margin-top: 40px;
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

		.process-step-row {
			padding: 60px 0px;
		}

		.process-desc {
			padding: 50px 0px;
		}

		.link {
			padding: 10px 50px;
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

		.item-title-28 {
			font-size: 24px;
		}

		.section-title-30 {
			font-size: 25px;
		}

		.footer-logo-img {
			width: 65px;
		}

		.testimonials-slider {
			margin-top: 40px;
		}

		.testimonials {
			padding-bottom: 150px;
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
