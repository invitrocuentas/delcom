<footer class="footer">
    <div class="contenedor">
        <div class="footer_logo w-100">
            <a href="<?php echo esc_url(home_url('')); ?>" title="<?php echo get_bloginfo('name'); ?>" class="logo w-100">
                <img src="<?php echo IMG; ?>/logo-footer.webp" title="<?php echo get_bloginfo('name'); ?>" alt="<?php echo get_bloginfo('name'); ?>" class="w-100">
            </a>
        </div>
        <div class="footer_grid w-100">
            <div class="w-100">
                <ul>
                    <li>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="Inicio">Inicio</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('productos')); ?>" title="Productos">Productos</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('nosotros')); ?>" title="Nosotros">Nosotros</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('blog')); ?>" title="Blog">Blog</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('contactanos')); ?>" title="Contáctanos">Contáctanos</a>
                    </li>
                </ul>
            </div>
            <div class="w-100">
                <ul>
                    <li>
                        <a href="<?php echo esc_url(home_url('marca/delcom')); ?>" title="Delcom">Delcom</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('marca/estandar')); ?>" title="Estándar">Estándar</a>
                    </li>
                </ul>
            </div>
            <div class="w-100">
                <?php get_info_contact(); ?>
            </div>
        </div>
        <div class="footer_follow-us">
            <p>Síguenos en:</p>
            <ul>
                <li>
                    <a href="<?php echo get_option('facebook') ?>" title="Facebook" target="_blank">
                        <img src="<?php echo IMG; ?>/fb.svg" alt="Facebook" title="Facebook">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="w-100 footer_credits">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
    </div>
</footer>

<?php wp_footer();?>

</body>
</html>