<?php
/*
    Template name: single-product
*/

get_header();

$ID = intval(get_the_ID());

$galeria = [];

// Obtiene la imagen destacada del producto
$imagenDestacada = get_the_post_thumbnail_url($ID, 'full');

// Obtiene las demás imágenes de la galería del producto
$imagenesGaleria = get_post_meta($ID, '_product_image_gallery', true);
$imagenesGaleria = explode(',', $imagenesGaleria);

array_unshift($galeria, $imagenDestacada);
foreach($imagenesGaleria as $img){array_unshift($galeria, wp_get_attachment_url($img));}

?>

<section class="product_view">
    <div class="contenedor">
        <div class="product_view-flex">
            <div class="product_view-images">

                <?php slider_products($galeria, 'main'); ?>
                <?php slider_products($galeria, 'thumbs'); ?>

            </div>
            <div class="product_view-info">
                <div class="product_view-content w-100">
                    <h1><?php echo get_the_title(); ?></h1>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                    <div class="action">
                        <?php  
                            flip_button('', get_the_title(), 'Cotizar', 'btn_cotizar');
                            flip_button('', get_the_title(), 'Cotizar', 'btn_pdf', IMG.'/pdf.svg');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('inc/show_products'); ?>

<section class="back">
    <div class="contenedor">
        <a href="<?php echo esc_url(home_url('/')); ?>" title="Volver">Volver</a>
    </div>
</section>

<?php 
    get_template_part('inc/contact_form'); 
    get_footer();
?>