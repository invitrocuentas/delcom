<?php
/*
    Template name: single
*/

get_header();
get_banner();

?>

<section class="single_block">
    <div class="contenedor">
        <div class="single_block-grid">
            <div class="w-100 single_block-content">

                <?php if (!empty(get_field('banner_entry'))) : ?>
                    <div class="relative w-100 single_block-banner">
                        <img src="<?php echo get_field('banner_entry')['url'] ?>" title="<?php echo get_field('banner_entry')['title'] ?>" alt="<?php echo get_field('banner_entry')['alt'] ?>" width="<?php echo get_field('banner_entry')['width'] ?>" height="<?php echo get_field('banner_entry')['height'] ?>" loading="lazy" class="w-100">
                        <div class="absolute tag">NUEVO</div>
                    </div>
                <?php endif; ?>

                <h1><?php the_title(); ?></h1>
                <div class="content w-100">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="w-100">
                <?php get_template_part('inc/get_other_posts'); ?>
            </div>
        </div>
        <div class="single_block-back w-100">
            <?php flip_button(get_the_permalink(), get_the_title(), 'Volver', 'link-it'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>