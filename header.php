<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head();?>
    
    <?php if (is_404()): ?>
    <title><?php echo get_bloginfo('name')." | 404"; ?></title>
    <?php else: ?>
    <title><?php echo get_bloginfo('name').' | '.get_the_title();?></title>
    <?php endif; ?>
</head>
<body <?php body_class(); ?>>

<header class="header w-100 <?php echo !is_front_page() ? 'scrolled no_change_scroll' : ''; ?>">
    <div class="contenedor">
        <div class="header_grid w-100">
            <div class="header_button">
                <button>
                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="15.2821" height="2.35108" rx="1.17554" fill="#198910"/>
                        <path d="M0 6.46546C0 5.81623 0.526308 5.28992 1.17554 5.28992H14.1065C14.7557 5.28992 15.2821 5.81623 15.2821 6.46546V6.46546C15.2821 7.11469 14.7557 7.641 14.1065 7.641H1.17554C0.526309 7.641 0 7.11469 0 6.46546V6.46546Z" fill="#198910"/>
                        <rect y="10.5799" width="15.2821" height="2.35108" rx="1.17554" fill="#198910"/>
                    </svg>
                </button>
            </div>
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo get_bloginfo('name'); ?>" class="header_logo d-block w-100">
                <img src="<?php echo IMG; ?>/logo.webp" title="<?php echo get_bloginfo('name'); ?>" alt="<?php echo get_bloginfo('name'); ?>" class="w-100">
            </a>
            <div class="w-100 header_navigation">
                <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container_class' => '', 'menu_class' => 'ul_menu w-100')); ?>
                <div class="header_form w-100">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
</header>