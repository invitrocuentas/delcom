<section class="clients">
    <div class="contenedor">
        <div class="clients_grid">
            <div class="clients-title">
                <h2><?php echo get_field('titulo_clients', 'option'); ?></h2>
            </div>
            <div class="w-100">

                <?php if(have_rows('logos_clients', 'option')): ?>
                    <div class="splide w-100" id="customers">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php while(have_rows('logos_clients', 'option')): the_row(); ?>
                                <li class="splide__slide">
                                    <?php if(!empty(get_sub_field('logo_client'))): ?>
                                    <img
                                        src='<?php echo get_sub_field('logo_client')['url'] ?>'
                                        alt='<?php echo get_sub_field('logo_client')['alt'] ?>'
                                        title='<?php echo get_sub_field('logo_client')['title'] ?>'
                                        height='<?php echo get_sub_field('logo_client')['height'] ?>'
                                        width='<?php echo get_sub_field('logo_client')['width'] ?>'
                                    >
                                    <?php endif; ?>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>