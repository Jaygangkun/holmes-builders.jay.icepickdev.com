<?php /* Block Name: Image Description Block */ ?>
<?php
$bk_img = get_field('background_image');
$bk_img_url = '';
if($bk_img) {
    $bk_img_url = $bk_img['url'];
}
?>
<section class="image-description valign-<?php the_field('vertical_align')?>" style="background-image: url(<?php echo $bk_img_url?>)">
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