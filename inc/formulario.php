<?php
    $productos = new WP_Query(array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ));
?>

<div class="box_form">

    <?php if ($productos->have_posts()) : ?>
    <div class="hidden options_form">
        <ul>
            <?php while ($productos->have_posts()) : $productos->the_post(); ?>
            <li><?php echo get_the_title(); ?></li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php wp_reset_query(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <p>Completa el siguiente formulario te enviaremos la información que necesitas.</p>
    <?php echo do_shortcode('[contact-form-7 id="f5379e6" title="Formulario de Contacto"]') ?>
</div>