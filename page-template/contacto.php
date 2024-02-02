<?php
/*
    Template name: contacto
*/

get_header();

get_banner();

?>

<section class="contacto">
    <div class="contenedor">
        <div class="contacto_grid">
            <div class="w-100">
                <div class="content">
                    <h2>Contáctanos</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean</p>
                    <?php get_info_contact(); ?>
                </div>
            </div>
            <div class="w-100">
                <?php get_template_part('inc/formulario');?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>