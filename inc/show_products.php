<?php
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
);
$products = get_posts($args);
?>

<?php if (!empty($products)) : ?>
    <section class="new_products">
        <div class="contenedor">

            <?php if(is_product()): ?>
            <h2>Productos similares</h2>
            <?php else: ?>
            <h2>Nuestros productos</h2>
            <?php endif; ?>
            
            <div class="splide" role="group" id="new_products">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php
                        foreach ($products as $product) :
                            $product_id = $product->ID;
                            echo '<li class="splide__slide">';
                            get_card_product($product_id);
                            echo '</li>';
                        ?>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata();wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>