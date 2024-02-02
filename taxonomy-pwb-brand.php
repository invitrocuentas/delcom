<?php
/*
    Template name: contacto
*/

get_header();

$taxonomy = 'pwb-brand';
$term = $wp_query->queried_object;

get_banner($term->name);

$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'pwb-brand',
            'field'    => 'term_id',
            'terms'    => $term->term_id,
        ),
    ),
);

$products = new WP_Query($args);

?>

<section class="products_container">
    <div class="contenedor">
        <?php if($products->have_posts()): ?>
        <div class="products_container-grid">
            <div class="list_categories w-100">
                <?php get_filters(); ?>
            </div>
            <main class="list_products">
                <div class="list_products-grid w-100">
                    <?php 
                        while ($products->have_posts()){
                            $products->the_post();

                            $product_id = get_the_ID();
                            get_card_product($product_id);
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            </main>
        </div>
        <div class="w-100">
            <a href="<?php echo esc_url(home_url('/')) ?>" class="products_back" title="Volver">Volver</a>
        </div>
        <?php else: ?>
        <div class="w-100">
            <p class="no-one">No hay productos disponibles</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php 
    get_template_part('inc/contact_form'); 
    get_footer(); 
?>