import Toastify from 'toastify-js';
import "toastify-js/src/toastify.css"

(function(){

    /* <button class="add-2-cart-button" data-redirect="0" data-product-id="<?php echo $ID; ?>" data-quantity="1">Añadir al carrito</button> */
    /*
    data-redirect, puede tener 3 opciones;
        - checkout (cualquier página)
        - 1 (para un reload)
        - 0 (para nada)
    data-product-id; el id del producto
    data-quantity; la cantidad a añadirse en el carrito
    */

    document.addEventListener("DOMContentLoaded", function() {

        let adminAjax = document.getElementsByName('admin_ajax')[0],
            uri = document.getElementsByName('uri')[0],
            miniCartBody = document.querySelector('mini-cart-body');

        document.body.addEventListener('click', (e)=>{
            if(e.target.classList.contains('add-2-cart-button')){
                e.preventDefault();
                let button = e.target;
                button.disabled = true;

                let isReloaded = e.target.getAttribute('data-redirect'),
                    productId = e.target.getAttribute('data-product-id'),
                    quantity = parseInt(e.target.getAttribute('data-quantity'));

                // Llama a la función para añadir el producto del carrito utilizando AJAX
                addToCart(productId, isReloaded, quantity);

                setTimeout(() => {
                    button.disabled = false;
                }, 2000);
            }

            if(e.target.classList.contains('remove-from-cart-button')){
                e.preventDefault();
                //pasar como parametro el data-cart-item-key dado por Woocommerce
                let cartItemKey = e.target.getAttribute('data-cart-item-key') ?? 0;
                removeFromCart(cartItemKey);
            }
        })

        // Función para agregar el producto al carrito utilizando AJAX
        function addToCart(productId, isReloaded, quantity) {
            if(adminAjax){
                jQuery.ajax({
                    type: 'POST',
                    url: adminAjax.value,
                    data: {
                        'action': 'add_product_to_cart',
                        'product_id': productId,
                        'quantity': quantity
                    },
                    success: function(response) {
                        // Puedes realizar acciones adicionales después de agregar el producto al carrito aquí
                        if(typeof(isReloaded) == 'number'){
                            if(isReloaded == 1){
                                window.location.reload();
                                return;
                            }else{
                                updateMiniCart();
                            }
                        }else{
                            if(uri){
                                window.location.href = `${uri.value}/${isReloaded}`
                            }else{
                                window.location.reload();
                            }
                        }
                        
                    }
                });
            }else{
                
            }
        }

        // Función para eliminar un producto del carrito utilizando AJAX
        function removeFromCart(cartItemKey) {
            if(adminAjax){
                if(cartItemKey != 0){
                    jQuery.ajax({
                        type: 'POST',
                        url: adminAjax.value, // Asegúrate de que adminAjax esté definido en tu código
                        data: {
                            'action': 'remove_product_from_cart',
                            'cart_item_key': cartItemKey
                        },
                        success: function(response) {
                            // Puedes realizar acciones adicionales después de eliminar el producto del carrito aquí
                            console.log(response)
                            updateMiniCart();
                        }
                    });
                }else{
    
                }
            }
        }

        // Función para actualizar el contenido del mini-cart
        function updateMiniCart() {
            if(adminAjax){
                jQuery.ajax({
                    type: 'POST',
                    url: adminAjax.value,
                    data: {
                        'action': 'get_mini_cart'
                    },
                    success: function(response) {
    
                        if(response){
                            if(miniCartBody){
                                miniCartBody.innerHTML = response;
                            }
                            openMiniCart();
                        }
    
                    }
                });
            }
        }

        // Función para abrir el carrito
        function openMiniCart(){
            // Toggle active mini-cart aside
        }

    });

})();