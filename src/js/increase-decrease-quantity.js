(function(){

    /* 
        <div class="quantity-button-box">
            <button type="button" class="quantity-button quantity-button-increase"></button>
            <span class="quantity-input">1</span>
            <button type="button" class="quantity-button quantity-button-decrease"></button>
        </div>
        <input type="hidden" class="maximum-quantity" value="">
    */

    document.addEventListener("DOMContentLoaded", function() {

        if(document.querySelector('.quantity-button-box')){

            let increaseButton = document.querySelector('.quantity-button-increase'), // buttons
                decreaseButton = document.querySelector('.quantity-button-decrease'),
                maximumQuantity = parseInt(document.querySelector('.maximun-quantity').value) ?? 9, // maximum quantity
                inputQuantity = document.querySelector('.quantity-input') // box number;

            let add2CartButton = document.querySelector('.add-2-cart-button');

            if(increaseButton){
                increaseButton.addEventListener('click', function(e){
                    e.preventDefault();
                    var currentQty = parseInt(inputQuantity.textContent)
                    if(currentQty < maximumQuantity){
                        if(inputQuantity){
                            inputQuantity.textContent = currentQty + 1;
                        }
                        if(add2CartButton){
                            putNumberInButton(currentQty + 1);
                        }
                    }
                })
            }

            if(decreaseButton){
                decreaseButton.addEventListener('click', function(e){
                    e.preventDefault();
                    var currentQty = parseInt(inputQuantity.textContent)
                    if(currentQty > 1){
                        if(inputQuantity){
                            inputQuantity.textContent = currentQty - 1;
                        }
                        if(add2CartButton){
                            putNumberInButton(currentQty - 1);
                        }
                    }
                })
            }

            function putNumberInButton(n){
                if(typeof(n) == 'number'){
                    add2CartButton.setAttribute('data-quantity', parseInt(n));
                }else{
                    add2CartButton.setAttribute('data-quantity', 1);
                }
            }

        }

    });

})();