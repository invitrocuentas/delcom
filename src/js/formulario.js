(function(){

    if(document.querySelector('.box_form')){

        let plusButtons = Array.from(document.querySelectorAll('form .form-product button'));
        plusButtons.forEach(button=>{
            button.addEventListener('click', (e)=>{
                e.preventDefault();
                e.currentTarget.classList.toggle('minus');
                let caja = e.currentTarget.closest('.form-product').nextElementSibling;
                caja.classList.toggle('none')
            })
        })

    }

    function optionsForm(){
        Array.from(document.querySelectorAll('.box_form')).forEach(form=>{
            Array.from(form.querySelectorAll('.seleccionable_producto')).forEach(select=>{
                Array.from(form.querySelectorAll('li')).forEach(option=>{
                
                    let opt = document.createElement('OPTION');
                    opt.textContent = option.textContent;
                    opt.value = option.textContent;
                    select.appendChild(opt);
    
                });
            });
        });
    }
    window.onpaint = optionsForm();

})();