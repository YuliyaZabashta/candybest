/*Cart*/
$('body').on('click','.add-to-cart-link', function(e){
    //e.preventDefault();
    var id = $(this).data('id'),
    qty = $('.quantity input').val() ? $('.quantity input').val():1,
    mod = $('.available select').val();
    $.ajax({
        url: '/cart/add',
        data:  {id:id, qty:qty, mod:mod},
        type: 'GET',
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    })
});

$('#cart .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    })
});

$('body').on('click','.minus-to-cart-link', function(e){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/minus',
        data:  {id:id},
        type: 'GET',
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    })
});

function showCart(cart){
    if($.trim(cart) == '<h3>Корзина пуста</h3>'){
        $(' #cart .modal-footer .btn-clear, #cart .modal-footer .btnsuccess').css('display', 'none');
    }else{
        $(' #cart .modal-footer .btn-clear, #cart .modal-footer .btn-success').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if($('.cart-sum').text()){
        $('.simpleCart_total').html($('#cart .cart-sum').text(руб));
    }else{
        $('.simpleCart_total').text('Корзина пуста');
    }
    if($('.cart-sum').text()){
        $('.simpleCart_qty').html($('#cart .qty').text(руб));
    }else{
        $('.simpleCart_qty').text('0');
    }

}


function getCart(){
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    })
}


function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success:function(){
            location.reload();
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });
}
/*Cart*/

    const animItems = document.querySelectorAll('._anim-items');

    if(animItems.length>0){
        window.addEventListener('scroll', animOnScroll);
        function animOnScroll(){
            for(let index = 0; index < animItems.length; index++){
                const animItem = animItems[index];
                const animItemHeight = animItem.offsetHeight;
                const animItemOffset = offset(animItem).top;
                const animStart = 4;
                
                let animItemPoint = window.innerHeight - animItemHeight / animStart;
                if(animItemHeight > window.innerHeight){
                    animItemPoint = window.innerHeight - window.innerHeight / animStart;
                }

                if((pageYOffset > animItemOffset - animItemPoint) && pageYOffset < (animItemOffset + animItemHeight)){
                    animItem.classList.add('_active');
                }else{
                    if(!animItem.classList.contains('_anim-no-hide')){
                        animItem.classList.remove('_active');
                    }
                }
            }
        }
        function offset(el){
            const rect = el.getBoundingClientRect(),
                scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
                scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            return{top: rect.top + scrollTop, left: rect.left + scrollLeft}
        }
        setTimeout(() =>{
            animOnScroll();
        },300); 
    }

/*Search*/
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: '/search/typeahead?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    //hint:false,
    highlight: true
},{
    name:'products',
    display: 'title',
    limit: 3,
    source: products
});

$('#typeahead').bind('typeahead:select',function(ev,suggestion){
    //console.log(suggestion);
    window.location=path+'/search/?s=' + encodeURIComponent(suggestion.title);
})

/*Search*/

var popup = document.getElementById('pop-up');

function popYes() {
  sessionStorage.setItem('popup', 'none');
  location.reload();
}

if(sessionStorage.getItem('popup') || !window.sessionStorage) {
  popup.parentNode.removeChild(popup);
}else{
  if(window.stop !== undefined) {
    window.stop();
  } else if (document.execCommand !== undefined) {
    document.execCommand("Stop", false);
  }
}


