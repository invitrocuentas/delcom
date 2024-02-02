<?php
// Creamos la función para el post type servicio
function custom_post_servicio() {
    // Registramos la función 'servicio' según el codex de WP
    register_post_type( 'servicio',
    // (http://codex.wordpress.org/Function_Reference/register_post_type)
      // Agregamos todas funciones adicionales para el post type servicio
      array( 'labels' => array(
        'name' => __( 'Servicios', 'andres-dev' ), /* El título del grupo */
        'singular_name' => __( 'Servicio', 'andres-dev' ), /* El título en singular */
        'all_items' => __( 'Todos los servicios', 'andres-dev' ), /* Todos los items del menú */
        'add_new' => __( 'Agregar nuevo', 'andres-dev' ), /* Agregar uno nuevo */
        'add_new_item' => __( 'Agregar nuevo servicio', 'andres-dev' ), /* Agregar nuevo con título */
        'edit' => __( 'Editar', 'andres-dev' ), /* Editar */
        'edit_item' => __( 'Editar servicio', 'andres-dev' ), /* Editar item */
        'new_item' => __( 'Nuevo servicio', 'andres-dev' ), /* Nuevo titulo en visualización */
        'view_item' => __( 'Ver servicio', 'andres-dev' ), /* Ver item */
        'search_items' => __( 'Buscar servicio', 'andres-dev' ), /* Buscar item */
        'not_found' => __( 'No se encontraron resultados', 'andres-dev' ), /* Se muestra si aún no hay entradas */
        'not_found_in_trash' => __( 'No se encontró nada en la Papelera', 'andres-dev' ), /* Se muestra si no hay nada en la papelera */
        ), /* end of arrays */
        'description' => __( 'Esto es un ejemplo de post type para servicios', 'andres-dev' ), /* Custom Type Description */
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 8, /* Este es el orden en que aparecerán en el menu de admin */
        'menu_icon' => 'dashicons-networking', /* El icono para el menu de admin */
        // Lo podemos agregar por medio de url o desde https://developer.wordpress.org/resource/dashicons
        'rewrite' => array( 'slug' => 'servicio', 'with_front' => false ), /* Se especifica el slug de la url, por lo general es el mismo post type 'servicio' */
        'has_archive' => 'servicio', /* Puede cambiar el nombre del slug */
        'capability_type' => 'post',
        'hierarchical' => false,
        /* Habilitamos ciertos parámetros para el editor de cada servicio */
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
        ) /* Fin de las opciones */
      ); /* Fin del registro post type */
}
    // Agregando la función al init de WordPress
    add_action( 'init', 'custom_post_servicio');

// Creamos la taxonomía serviciosgenero para servicios
add_action( 'init', 'crear_servicio_taxonomy' );
function crear_servicio_taxonomy() {
  register_taxonomy(
    'serviciosgenero', // Nombre de la taxonomía
    'servicio', // Nombre del post type que se le asignará
    array(
      'label' => __( 'Servicios Categoría' ),
      'rewrite' => array( 'slug' => 'serviciosgenero' ),
      'hierarchical' => true,
    )
  );
}


// Creamos taxonomía tags para servicios
add_action( 'init', 'crear_servicio_taxonomy_tags' );
function crear_servicio_taxonomy_tags() {
  register_taxonomy(
    'tag_servicio', // Nombre de la taxonomía
    'servicio', // Nombre del post type que se le asignará
    array(
      'rewrite' => array( 'slug' => 'tag_servicio' ),
      'hierarchical' => false,
      'update_count_callback' => '_update_post_term_count',
    )
  );
}


// Ahora vamos a agregar categorías personalizadas (estas actúan como categorías)
register_taxonomy( 'serviciosgenero', 
array('servicio'), /* Agregue el post type al cual le asignara la taxonomía */
array('hierarchical' => true,     /* Si es true actua como categoria - si es false como etiqueta */
  'labels' => array(
    'name' => __( 'Géneros', 'andres-dev' ), /* Nombre de la taxonomía */
    'singular_name' => __( 'Género', 'andres-dev' ), /* Nombre en singular de la taxonomía */
    'search_items' =>  __( 'Buscar géneros', 'andres-dev' ), /* Título para buscar taxonomías */
    'all_items' => __( 'Todos los géneros', 'andres-dev' ), /* Listado de item de taxonomía */
    'parent_item' => __( 'Género padre', 'andres-dev' ), /* Título del padre de la taxonomía */
    'parent_item_colon' => __( 'Género padre:', 'andres-dev' ), /* Título del padre de la taxonomía */
    'edit_item' => __( 'Editar género', 'andres-dev' ), /* Editar una taxonomía */
    'update_item' => __( 'Actualizar género', 'andres-dev' ), /* Actualizar el título de una taxonomía */
    'add_new_item' => __( 'Agregar nuevo género', 'andres-dev' ), /* Agregar nueva taxonomía */
    'new_item_name' => __( 'Nuevo género', 'andres-dev' ) /* Título de la nueva taxonomia */
  ),
  'show_admin_column' => true, 
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'serviciosgenero' ),
)
);



// Ahora vamos a agregar etiquetas personalizadas
register_taxonomy( 'tags_servicio', 
array('servicio'), /* Agregue el post type al cual le asignara la taxonomía */
array('hierarchical' => false,    /* Si es true actua como categoria - si es false como etiqueta */
  'labels' => array(
    'name' => __( 'Tags servicios', 'andres-dev' ), /* Nombre de la taxonomía */
    'singular_name' => __( 'Tag', 'andres-dev' ), /* Nombre en singular de la taxonomía */
    'search_items' =>  __( 'Buscar tags', 'andres-dev' ), /* Título para buscar taxonomías */
    'all_items' => __( 'Todos los tags', 'andres-dev' ), /* Listado de item de taxonomía */
    'parent_item' => __( 'Tag padre', 'andres-dev' ), /* Título del padre de la taxonomía */
    'parent_item_colon' => __( 'Tag padre:', 'andres-dev' ), /* Título del padre de la taxonomía */
    'edit_item' => __( 'Editar tag', 'andres-dev' ), /* Editar una taxonomía */
    'update_item' => __( 'Actualizar tag', 'andres-dev' ), /* Actualizar el título de una taxonomía */
    'add_new_item' => __( 'Agregar nuevo tag', 'andres-dev' ), /* Agregar nueva taxonomía */
    'new_item_name' => __( 'Nuevo tag', 'andres-dev' ) /* Título de la nueva taxonomia */
  ),
  'show_admin_column' => true,
  'show_ui' => true,
  'query_var' => true,
)
);

// /* Registra soporte para categorías al post type servicio */
register_taxonomy_for_object_type( 'category', 'servicio' );
// /* Registrar soporte para tags al post type servicio */
register_taxonomy_for_object_type( 'post_tag', 'servicio' );

?>