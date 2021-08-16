<style>
	.home-hero-slide-img-wrap {
		position: relative;
		width: 100%;
		padding-top: 45%;
		background-size: cover;
		background-repeat: repeat;
		background-position: center;
	}

	.home-hero-slide-img-wrap::before {
		position: absolute;
		content: '';
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		background: linear-gradient(13.27deg, rgba(0, 0, 0, 0.56) 3.67%, rgba(0, 0, 0, 0) 56.95%);
	}

	.item-title-28 {
		font-style: normal;
		font-weight: normal;
		font-size: 28px;
		line-height: 35px;
		text-align: center;

		color: #FFFFFF;
		position: absolute;
		bottom: 80px;
		left: 50%;
		transform: translateX(-50%);
	}

	.home-hero {
		position: relative;
	}

	.home-hero-nav {
		position: absolute;
		left: 50%;
		transform: translateX(-50%);
		bottom: 40px;
	}

	.home-hero-nav-wrap {
		display: flex;
		align-items: center;
	}

	.home-hero-nav__line {
		width: 330px;
		margin-right: 20px;
		background: #ffffff;
		height: 2px;
	}

	.home-hero-nav__numb-current {
		font-style: normal;
		font-weight: 500;
		font-size: 18px;
		line-height: 18px;

		color: #FFFFFF;
	}

	.home-hero-nav__numb-total {
		font-style: normal;
		font-weight: normal;
		font-size: 14px;
		line-height: 18px;

		color: #FFFFFF;
		margin-left: -4px;
	}

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

	.section-sub-title-12 {
		font-style: normal;
		font-weight: normal;
		font-size: 12px;
		line-height: 15px;

		letter-spacing: 0.07em;
		text-transform: uppercase;

		color: #FFFFFF;
	}

	.general-hero-content {
		max-width: 330px;
	}

	.home-sites {
        padding: 50px 0px;
    }

	.link {
        padding: 15px 60px;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 15px;

        text-align: center;
        letter-spacing: 0.07em;
        text-transform: uppercase;

        color: #212121;
        background: #ffffff;
        display: inline-block;
        cursor: pointer;
        text-decoration: none;
    }

    .link:hover {
        text-decoration: none;
        color: #212121;
        background: #ffffff;
    }

    .link-black {
        background: #212121;
        color: #ffffff;
    }

    .link-black:hover {
        background: #212121;
        color: #ffffff;
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

    .item-text-25 {
        font-style: normal;
        font-weight: normal;
        font-size: 25px;
        line-height: 31px;

        color: #FFFFFF;
    }

	.item-text-22 {
		font-style: normal;
		font-weight: normal;
		font-size: 22px;
		line-height: 32px;

		text-align: center;
		letter-spacing: -0.4px;

		color: #FFFFFF;
	}

	.item-text-23 {
		font-style: normal;
		font-weight: normal;
		font-size: 23px;
		line-height: 29px;
		text-align: center;

		color: #FFFFFF;
	}

    .item-text-10 {
        font-style: normal;
        font-weight: 600;
        font-size: 10px;
        line-height: 13px;

        letter-spacing: 0.07em;
        text-transform: uppercase;

        color: #FFFFFF;
    }

	.item-text-12 {
		font-style: normal;
		font-weight: normal;
		font-size: 12px;
		line-height: 15px;
		text-align: center;
		letter-spacing: 0.07em;
		text-transform: uppercase;

		color: #FFFFFF;
	}

    .home-sites-slide__link {
        margin-top: 10px;
    }

    .home-sites-slide {
        padding-right: 16px;
    }

    .section-title-30 {
        font-style: normal;
        font-weight: normal;
        font-size: 30px;
        line-height: 37px;

        color: #212121;
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

    .section-title-28 {
        font-style: normal;
        font-weight: normal;
        font-size: 28px;
        line-height: 35px;

        color: #FFFFFF;
    }

    .desc-17 {
        font-size: 17px;
        line-height: 33px;

        color: #FFFFFF;
    }

    .image-description .section-title-28 {
        margin-bottom: 20px;
    }

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

		.home-hero-nav__line {
			width: 230px;
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

		.testimonials-slider {
			margin-top: 40px;
		}

		.testimonials {
			padding-bottom: 150px;
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
