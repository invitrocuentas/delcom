<?php 

/** 
    *InVitro Agencia Digital
    *@link 
    *@package WordPress
    *@subpackage InVitro Agencia Digital
    *@since 1.0.0
    *@version 1.0.0
*/

define('URL', get_stylesheet_directory_uri());
define('IMG', URL.'/images');
define('JS', URL.'/libraries/js');
define('CSS', URL.'/libraries/css');
define('EXTERNAL', URL.'/external');

// Registro de scripts y stylesheets
if(!function_exists ('general_scripts')):
    function general_scripts(){
        wp_enqueue_style('style', get_stylesheet_uri(), array(),'1.0.0','all');        
        wp_enqueue_style('maincss', get_template_directory_uri().'/public/css/app.css','1.0.0','all');        
        wp_enqueue_style('animatecss', CSS.'/animate.min.css', '1.0.0', 'all');
        wp_enqueue_style('splidecss', CSS.'/splide.min.css', '1.0.0', 'all');


        wp_enqueue_script('splidejs', JS.'/splide.min.js',array(),'1.0.0',true);
        wp_enqueue_script('splideautoscrolljs', JS.'/splide-extension-auto-scroll.min.js',array(),'1.0.0',true);
        wp_enqueue_script('mainjs', get_template_directory_uri().'/public/js/main.min.js',array(),'1.0.0',true);
        wp_enqueue_script('wowjs', JS.'/wow.min.js',array(),'1.0.0',true);
    }
endif;
add_action('wp_enqueue_scripts', 'general_scripts');

// Añadir thumbnails a las entradas de WordPress
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

// Máximo 30 palabras traidas por el get_the_excerpt()
function my_excerpt_length($length){return 30;}
add_filter('excerpt_length', 'my_excerpt_length');

// Registrar menús
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'En la cabecera' ),
        )
    );
}
add_action( 'init', 'register_my_menus' );

// Registrar widgets
function register_my_widgets() {
    register_sidebar( array( // dynamic_sidebar('sidebar-principal');
        'name' => __( 'Sidebar principal', 'my_store' ),
        'id' => 'sidebar-principal',
        'description' => __( 'Sidebar de categoría', 'my_store' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}
add_action( 'widgets_init', 'register_my_widgets' );

// Registro de campos personalizados para secciones que se repiten en toda la web (inc/)
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'menu_title'  => 'Secciones Repetidas',
        'menu_slug'   => 'theme-general-settings',
        'icon_url'    => 'dashicons-table-row-before',
        'redirect'    => false
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'Clientes',
        'menu_title'  => 'Clientes',
        'parent_slug' => 'theme-general-settings'
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'Eventos Sociales',
        'menu_title'  => 'Eventos Sociales',
        'parent_slug' => 'theme-general-settings'
    ));
}

// Funcion para debuggear un array/object
function debuggear($e){
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

function flip_button($href = '#', $title = '', $txt = '', $classes = '', $image = ''){
    echo '<a class="'.$classes.'" href="'.$href.'" title="'.$title.'">
        <div class="'.$classes.'-inner">
            <div class="d-block w-100 '.$classes.'-front"></div>
            <div class="d-block w-100 '.$classes.'-back"></div>
        </div>';
        if(!empty($image)){
            echo '<p>
                <img src="'.$image.'" />
                '.$txt.'
            </p>';
        }else{
            echo '<p>'.$txt.'</p>';
        }
    echo '</a>';
}

function get_social_bar(){
    if(!empty(get_option('facebook')) && !empty(get_option('instagram')) && !empty(get_option('youtube'))){
        echo '<ul class="social_bar">';
        if(!empty(get_option('facebook'))){
            echo '<li><a href="'.get_option('facebook').'" target="_blank" title="Facebook">
                <img src="'.IMG.'/social/fb.webp" title="Facebook" alt="Facebook">
            </a></li>';
        }
        if(!empty(get_option('instagram'))){
            echo '<li><a href="'.get_option('instagram').'" target="_blank" title="Instagram">
                <img src="'.IMG.'/social/ig.webp" title="Instagram" alt="Instagram">
            </a></li>';
        }
        if(!empty(get_option('youtube'))){
            echo '<li><a href="'.get_option('youtube').'" target="_blank" title="Youtube">
                <img src="'.IMG.'/social/yt.webp" title="Youtube" alt="Youtube">
            </a></li>';
        }
        echo '</ul>';
    }
}

function get_banner($txt = ''){
    echo '<section class="banner pt-header">
        <div class="contenedor">';
            if(!empty($txt)){
                echo '<h1>'.$txt.'</h1>';
            }else{
                echo '<h1>'.get_the_title().'</h1>';
            }
    echo '</div>
    </section>';
}

function get_info_contact(){
    echo '<ul class="info_contact">
        <li>
            <img src="'.IMG.'/mail.svg" alt="Correo" title="Correo">
            <div>';
                if(!empty(get_option('correo_1'))){
                    echo '<a href="mailto:'.get_option('correo_1').'">'.get_option('correo_1').'</a>';
                }
                if(!empty(get_option('correo_2'))){
                    echo '<a href="mailto:'.get_option('correo_2').'">'.get_option('correo_2').'</a>';
                }
    echo    '</div>
        </li>
        <li>
            <img src="'.IMG.'/tel.svg" alt="Teléfono" title="Teléfono">
            <div>
                <p>981 599 430 / 935 673 158</p>';
                if(!empty(get_option('nro_1'))){
                    echo '<a href="tel:'.get_option('nro_1').'">'.get_option('nro_1').'</a>';
                }
    echo    '</div>
        </li>
    </ul>';
}

function slider_products($gallery = [], $id = ''){
    if(!empty($gallery)){
        echo '<div class="splide" role="group" id="'.$id.'">
            <div class="splide__track">
                <ul class="splide__list">';
                    foreach($gallery as $image){
                        echo '<li class="splide__slide">
                            <img src="'.$image.'" alt="'.get_the_title().'" title="'.get_the_title().'">
                        </li>';
                    }
            echo '</ul>
            </div>
        </div>';
    }
}

function get_filters(){

    $product_categories = get_terms( 'product_cat', array(
        'hide_empty' => false,
        'parent' => 0,
        'exclude' => array(15),
    ));

    if(!empty($product_categories)){
        echo '<div class="w-100 filter">
            <div class="filter_button">
                <button type="button">Filtrar</button>
            </div>
            <div class="filter_body">
                <h2>Categorías</h2>
                <ul>';
                    foreach($product_categories as $category){
                        echo '<li>
                            <input type="checkbox" value="'.$category->term_id.'" id="cat'.$category->term_id.'">
                            <label for="cat'.$category->term_id.'">'.$category->name.'</label>
                        </li>';
                    }
            echo '</ul>
            </div>
        </div>';
    }else{
        echo '<div class="w-100 filter_none">
            <p class="no-one">No existen categorías</p>
        </div>';
    }
}

function get_card_product($id){
    // Verificar si el producto con el ID dado existe
    if (get_post_type($id) !== 'product') {
        return false;
    }

    // Obtener el objeto de producto
    $product = wc_get_product($id);

    // Verificar si el objeto de producto es válido
    if (!$product || is_wp_error($product)) {
        return false;
    }

    // Obtener el nombre del producto
    $product_name = $product->get_name();

    // Obtener la imagen destacada del producto
    $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
    $product_image_url = ($product_image) ? $product_image[0] : wc_placeholder_img_src();

    // Obtener el enlace permanente (permalink) del producto
    $product_permalink = get_permalink($id);

    // Obtener la primera marca a la que pertenece el producto
    $product_brands = wp_get_post_terms($id, 'pwb-brand');
    $first_brand = (!empty($product_brands)) ? $product_brands[0]->name : '';

    if(!empty($product_image)){
        echo '<a class="card_product" href="'.$product_permalink.'" title="'.$product_name.'">
            <img src="'.$product_image_url.'" title="'.$product_name.'" alt="'.$product_name.'">
            <div class="card_product-head">
                <h3>'.$product_name.'</h3>';
                if(!empty($first_brand)){
                    echo '<h4>'.$first_brand.'</h4>';
                }
        echo '</div>
            <div class="card_product-foot">
                <div>Cotizar</div>
            </div>
        </a>';
    }
}

// OBTENIENDO LA CANTIDAD DE PRODUCTOS QUE HAY EN MI CARRITO
function getProductsQuantityInCart() {
    // Verifica si WooCommerce está activo
    if (class_exists('WooCommerce')) {
        // Obtiene la instancia del carrito de WooCommerce
        $carrito = WC()->cart;

        // Obtiene la cantidad de productos en el carrito
        $cantidad_productos = $carrito->get_cart_contents_count();

        return $cantidad_productos < 9 ? $cantidad_productos : '+9';
    } else {
        return 0; // WooCommerce no está activo o no instalado
    }
}

// Agregar el producto al carrito utilizando AJAX
add_action('wp_ajax_add_product_to_cart', 'add_product_to_cart');
add_action('wp_ajax_nopriv_add_product_to_cart', 'add_product_to_cart');
function add_product_to_cart() {
    if (class_exists('WooCommerce')) {
        if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
            $product_id = intval($_POST['product_id']);
            $quantity = intval($_POST['quantity']);
    
            WC()->cart->add_to_cart($product_id, $quantity);
        }
        wp_die();
    }
}

// Eliminar el producto del carrito utilizando AJAX
add_action('wp_ajax_remove_product_from_cart', 'remove_product_from_cart');
add_action('wp_ajax_nopriv_remove_product_from_cart', 'remove_product_from_cart');
function remove_product_from_cart() {
    if (class_exists('WooCommerce')) {
        if (isset($_POST['cart_item_key'])) {
            $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
            
            // Eliminar el producto del carrito
            WC()->cart->remove_cart_item($cart_item_key);
            
            // Devolver una respuesta (puedes personalizarla según tus necesidades)
            echo 'Producto eliminado del carrito';
        }
        wp_die();
    }
}

// Actualizar el carrito y su estructura utlizando AJAX
add_action('wp_ajax_get_mini_cart', 'get_mini_cart');
add_action('wp_ajax_nopriv_get_mini_cart', 'get_mini_cart');
function get_mini_cart() {
    if (class_exists('WooCommerce')) {
        echo wc_get_template('cart/mini-cart.php');
        wp_die();
    }
}


require_once get_template_directory().'/inc/informacion_general.php';
// require_once get_template_directory().'/inc/modules/productos.php';
// require_once get_template_directory().'/inc/modules/servicios.php';