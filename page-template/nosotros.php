<?php
/*
    Template name: nosotros
*/

get_header();
get_banner();

?>

<section class="who_are_us our_section">
    <div class="contenedor">
        <div class="grid">
            <div class="w-100">
                <?php if (!empty(get_field('imagen_qs'))) : ?>
                    <div class="who_are_us-image">
                        <img src="<?php echo get_field('imagen_qs')['url'] ?>" title="<?php echo get_field('imagen_qs')['title'] ?>" alt="<?php echo get_field('imagen_qs')['alt'] ?>" width="<?php echo get_field('imagen_qs')['width'] ?>" height="<?php echo get_field('imagen_qs')['height'] ?>" loading="lazy">
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-100 who_are_us-content">
                <div class="content w-100">
                    <?php echo get_field('contenido_qs') ?? ''; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mv-ision our_section">
    <div class="contenedor">
        <div class="grid">
            <div class="w-100">
                <div class="mv-ision-card left">
                    <?php if (!empty(get_field('imagen_m'))) : ?>
                        <div class="mv-ision-image">
                            <img src="<?php echo get_field('imagen_m')['url'] ?>" title="<?php echo get_field('imagen_m')['title'] ?>" alt="<?php echo get_field('imagen_m')['alt'] ?>" width="<?php echo get_field('imagen_m')['width'] ?>" height="<?php echo get_field('imagen_m')['height'] ?>" loading="lazy">
                        </div>
                    <?php endif; ?>
                    <div class="mv-ision-content">
                        <h2>MISIÓN</h2>
                        <p><?php echo get_field('descripcion_m') ?></p>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <div class="mv-ision-card right">
                    <?php if (!empty(get_field('imagen_v'))) : ?>
                        <div class="mv-ision-image">
                            <img src="<?php echo get_field('imagen_v')['url'] ?>" title="<?php echo get_field('imagen_v')['title'] ?>" alt="<?php echo get_field('imagen_v')['alt'] ?>" width="<?php echo get_field('imagen_v')['width'] ?>" height="<?php echo get_field('imagen_v')['height'] ?>" loading="lazy">
                        </div>
                    <?php endif; ?>
                    <div class="mv-ision-content">
                        <h2>VISIÓN</h2>
                        <p><?php echo get_field('descripcion_v') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="values our_section">
    <div class="contenedor">
        <div class="values-flex">
            <?php if (have_rows('lista_valores')) : ?>
                <?php while (have_rows('lista_valores')) : the_row(); ?>
                <div class="col">
                    <div class="value_card">
                        <?php if (!empty(get_sub_field('imagen_valor'))) : ?>
                            <div class="value_card-img">
                                <img src="<?php echo get_sub_field('imagen_valor')['url'] ?>" title="<?php echo get_sub_field('imagen_valor')['title'] ?>" alt="<?php echo get_sub_field('imagen_valor')['alt'] ?>" width="<?php echo get_sub_field('imagen_valor')['width'] ?>" height="<?php echo get_sub_field('imagen_valor')['height'] ?>" loading="lazy">
                            </div>
                        <?php endif; ?>
                        <div class="value_card-info">
                            <h3><?php echo get_sub_field('titulo_valor') ?></h3>
                            <div class="content w-100">
                                <?php echo get_sub_field('contenido_valor') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="we_want our_section">
    <div class="contenedor">
        <div class="grid">
            <div class="w-100">
                <h2>QUISIERAMOS...</h2>
            </div>
            <div class="contenido w-100">
                <?php echo get_field('contenido_quisieramos') ?>
            </div>
        </div>
    </div>
</section>

<?php
get_template_part('inc/eventos_sociales');
get_template_part('inc/clients');
get_footer();
?>