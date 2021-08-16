<?php /* Block Name: Image Description Block */ ?>
<style>
    .image-description {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        padding-top: 400px;
        padding-bottom: 60px;
        position: relative;
        margin-bottom: 10px;
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
</style>
<?php
$bk_img = get_field('background_image');
$bk_img_url = '';
if($bk_img) {
    $bk_img_url = $bk_img['url'];
}
?>
<section class="image-description" style="background-image: url(<?php echo $bk_img_url?>)">
	<div class="container position-relative">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-title-28"><?php the_field('title')?></h2>
                <div class="desc-17"><?php the_field('description')?></div>
                <?php
                $link = get_field('link');
                if($link) {
                    ?>
                    <a class="link image-description-link" href="<?php echo $link['url']?>" target="<?php echo $link['target']?>"><?php echo $link['title']?></a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<script>
	(function($){
		$(document).ready(function() {
	
		})
	})(jQuery)
</script>