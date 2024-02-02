<?php
/*
    Template name: inicio
*/

get_header();

get_social_bar();

?>

<?php if (have_rows('slides')) : ?>
    <main class="hero no-pt-header">
        <div class="splide wh-100" id="hero">
            <div class="splide__arrows contenedor">
                <button class="splide__arrow splide__arrow--prev">
                    <img src="<?php echo IMG; ?>/arrow-prev.svg" alt="Prev" title="Prev">
                </button>
                <button class="splide__arrow splide__arrow--next">
                    <img src="<?php echo IMG; ?>/arrow-next.svg" alt="Next" title="Next">
                </button>
            </div>
            <div class="splide__track wh-100">
                <ul class="splide__list h-100">
                    <?php while (have_rows('slides')) : the_row(); ?>
                        <?php if (!empty(get_sub_field('imagen_desktop'))) : ?>
                            <li class="splide__slide wh-100">
                                <img src='<?php echo get_sub_field('imagen_desktop')['url'] ?>' alt='<?php echo get_sub_field('imagen_desktop')['alt'] ?>' title='<?php echo get_sub_field('imagen_desktop')['title'] ?>' height='<?php echo get_sub_field('imagen_desktop')['height'] ?>' width='<?php echo get_sub_field('imagen_desktop')['width'] ?>'>
                            </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <div class="contenedor">
            <?php flip_button('', get_the_title(), 'Cotizar', 'link-it'); ?>
        </div>
    </main>
<?php endif; ?>

<section class="bg">

    <?php if (have_rows('razones')) : ?>
        <section class="choose_delcom">
            <div class="contenedor">
                <h2>¿Por qué elegir <b>Delcom?</b></h2>
                <div class="choose_delcom-flex">
                    <?php while (have_rows('razones')) : the_row(); ?>
                        <div class="reason">
                            <?php if (!empty(get_sub_field('imagen_razon'))) : ?>
                                <div class="reason_image">
                                    <img src="<?php echo get_sub_field('imagen_razon')['url'] ?>" title="<?php echo get_sub_field('imagen_razon')['title'] ?>" alt="<?php echo get_sub_field('imagen_razon')['alt'] ?>" width="<?php echo get_sub_field('imagen_razon')['width'] ?>" height="<?php echo get_sub_field('imagen_razon')['height'] ?>" loading="lazy">
                                </div>
                            <?php endif; ?>
                            <div class="reason_txt">
                                <p><?php echo get_sub_field('titulo_razon') ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part('inc/brands'); ?>

</section>

<?php
get_template_part('inc/show_products');
get_template_part('inc/clients');
get_template_part('inc/contact_form');
get_footer();
?>