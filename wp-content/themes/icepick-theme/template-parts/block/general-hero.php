<?php /* Block Name: General Hero Block */ ?>
<?php 
$bk = get_field('background_image');
$bk_url = '';
if($bk) {
    $bk_url = $bk['url'];
}
?>
<section class="general-hero" style="background-image:url(<?php echo $bk_url?>)">
	<div class="container position-relative">
        <div class="general-hero-content">
            <h6 class="section-sub-title-12"><?php the_field('sub_title')?></h6>
            <h1 class="section-title-28"><?php the_field('title') ?></h1>
        </div>
    </div>
</section>