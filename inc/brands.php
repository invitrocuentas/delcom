<?php

$taxonomy = 'pwb-brand';
$brands = get_terms($taxonomy, array(
    'hide_empty' => false,
));

if (!empty($brands)) : ?>

    <section class="brands">
        <div class="contenedor">
            <?php if(is_front_page()): ?>
                <h2>Marcas</h2>
            <?php endif; ?>
            <div class="brands_grid">

                <?php foreach ($brands as $brand) :

                    $brand_title = $brand->name;
                    $brand_permalink = get_term_link($brand);

                    $brandLogoID = get_term_meta( $brand->term_id, 'pwb_brand_image', true );
                    $brandLogo = wp_get_attachment_url( $brandLogoID );

                ?>
                <?php if(!empty($brandLogoID)): ?>
                    <a class="card_brand w-100" href="<?php echo $brand_permalink; ?>" title="<?php echo $brand_title; ?>">
                        <div class="card_brand-image">
                            <img src="<?php echo $brandLogo; ?>" alt="<?php echo $brand_title; ?>" title="<?php echo $brand_title; ?>">
                        </div>
                        <div class="card_brand-txt">
                            <h3><?php echo $brand_title; ?></h3>
                        </div>
                    </a>
                <?php endif; ?>
                <?php endforeach; ?>

            </div>

            <?php if(!is_front_page()): ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" title="Volver" class="brands_back">Volver</a>
            <?php endif; ?>

        </div>
    </section>

<?php endif; ?>