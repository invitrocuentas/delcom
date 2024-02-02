<?php
/*
    Template name: search
*/

get_header();

get_banner('Buscador');
    
?>

<?php
    $s = get_search_query();
    $results = new WP_Query(array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        's' => $s,
    ));
    
    $count_result = $results->found_posts;
?>

<section class="products_container">
    <div class="contenedor">
        <?php if($results->have_posts()): ?>
        <div class="w-100">
            <p class="counter">Se encontraron <?php echo $count_result; ?> resultado(s).</p>
        </div>
        <div class="products_container-grid all">
            <main class="list_products">
                <div class="list_products-grid w-100">
                    <?php 
                        while ($results->have_posts()){
                            $results->the_post();

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

<?php get_footer(); ?>