<?php
    $ID = intval(get_the_ID());
    
    $wp_query = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'DESC',
        'post__not_in' => array($ID),
    ));
?>

<aside>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="article">
                <div class="article-thumbnail">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full');
                    }
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
        <?php endwhile; ?>
    <?php endif; ?>
</aside>