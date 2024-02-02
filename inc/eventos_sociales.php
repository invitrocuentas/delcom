<section class="social_events social_events-bg">
    <div class="social_events-grid">
        <div class="w-100">
            <?php if (!empty(get_field('imagen_social', 'option'))) : ?>
                <img src="<?php echo get_field('imagen_social', 'option')['url'] ?>" title="<?php echo get_field('imagen_social', 'option')['title'] ?>" alt="<?php echo get_field('imagen_social', 'option')['alt'] ?>" width="<?php echo get_field('imagen_social', 'option')['width'] ?>" height="<?php echo get_field('imagen_social', 'option')['height'] ?>" loading="lazy">
            <?php endif; ?>
        </div>
        <div class="w-100">
            <div class="content">
                <h2><?php echo get_field('titulo_social', 'option') ?></h2>
                <p><?php echo get_field('descripcion_social', 'option') ?></p>
                <?php flip_button(get_the_permalink(), get_the_title(), 'Ver más', 'link-it'); ?>
            </div>
        </div>
    </div>
</section>