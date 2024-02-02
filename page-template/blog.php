<?php
/*
    Template name: blog
*/

get_header();

get_banner();

?>

<?php
global $wp_query, $paged;

$actualPage = $paged ? $paged : 1;

$wp_query = new WP_Query(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 8,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged
));

$maximumPage = $wp_query->max_num_pages;
?>

<section class="articles">
    <div class="contenedor">
        <h2>Artículos</h2>
        <?php if (have_posts()) : ?>
            <div class="articles-grid">
                <?php $counter = 1; while (have_posts()) : the_post(); ?>
                    <?php if($counter == 1): ?>
                    <article class="article_big">
                        <div class="article_big-tag">NUEVO</div>
                        <?php 
                            /*if (has_post_thumbnail()){
                                $thumbnail_data = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                $thumbnail_src = $thumbnail_data[0];
                                echo '<div class="wh-100 article_big-bg" style="background:url('.$thumbnail_src.')"></div>';
                            }*/
                            if(!empty(get_field('banner_entry'))){
                                $thumbnail_src = get_field('banner_entry')['url'];
                                echo '<div class="wh-100 article_big-bg absolute" style="background:url('.$thumbnail_src.') no-repeat top;"></div>';
                            }
                        ?>
                        <div class="article_big-content">
                            <h2 class="article_big-title"><?php echo get_the_title(); ?></h2>
                            <div class="article_big-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>
                    <?php else: ?>
                    <article class="article">
                        <div class="article-thumbnail">
                            <?php
                                if (has_post_thumbnail()){the_post_thumbnail('full');}
                            ?>
                        </div>
                        <div class="article-content">
                            <h3 class="article-title">
                                <?php echo get_the_title(); ?>
                            </h3>
                            <div class="article-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <div class="article-meta">
                            <div class="article-date">
                                <img src="<?php echo IMG; ?>/calendar.svg" alt="Fecha" title="Fecha">
                                <p><?php echo get_the_date('d/m/Y'); ?></p>
                            </div>
                            <div class="article-view">
                                <img src="<?php echo IMG; ?>/eye.svg" alt="Vistas" title="Vistas">
                                <p>Lorem</p>
                            </div>
                            <div class="article-permalink">
                                <?php flip_button(get_the_permalink(), get_the_title(), 'Más información', 'link-it'); ?>
                            </div>
                        </div>
                    </article>
                    <?php endif; ?>
                <?php $counter++; endwhile; ?>
            </div>

            <div class="articles-pagination">
                <!-- Mostrar enlaces de paginación -->
                <?php
                    echo paginate_links(array(
                        'total' => $maximumPage,
                    ));
                ?>
            </div>

            <?php wp_reset_postdata();
            wp_reset_query(); ?>
        <?php else : ?>
            <div class="w-100">
                <p class="no-one">No hay entradas disponibles</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_template_part('inc/eventos_sociales');
get_template_part('inc/contact_form');
get_footer();
?>