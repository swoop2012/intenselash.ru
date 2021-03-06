var cart;
function glx_input_checkall(class_list) {
    cart = $("#basket-form1");
    setDelete();
    $.each(class_list,function(key,value){
        var element = $('.'+value);
        if(element.attr('checked'))
            element.addClass('selected');
        element.find('input:radio').css('visibility','hidden');
        switch (key){
            case 'delivery':
                element.bind('click',function(){
                    var block = $(this);
                    glx_input_check(block);
                    select_delivery(block)

                })
                break;
            case 'payment':
                element.bind('click',function(){
                    var block = $(this);
                    glx_input_check(block);
                    select_payment(block)
                })
                break;
        }
    });
}

function glx_input_check(obj) {
    var elm = obj.find('input:radio');
    if (!elm.attr('checked')) {
        elm.attr('checked','checked');
        obj.addClass('selected');
        obj.siblings().removeClass('selected');
    }
}

function select_payment(element){
    var type = parseInt(element.data('type'))-1;

    ajaxParams.id = element.data('id');
    ajaxParams.type = 'payment';
    $.post('/order/setParam',ajaxParams);
    $('.tabs').show();
}

function select_delivery(element){
    var i = element.index();
    var type = parseInt(element.data('type'))-1;
    var deliveryBlock = cart.find('.delivery');
    var price = deliveryBlock.find('.price span')
    var count = deliveryBlock.find('.count span')
    var sum = deliveryBlock.find('.sum span')
    var payment =  $('.payments .payment-select');
    price.text(element.data('price'));
    count.text(1);
    sum.text(element.data('price'));
    countCart();
    ajaxParams.id = element.data('id');
    ajaxParams.type = 'delivery';


    $.post('/order/setParam',ajaxParams);
    payment.eq(i).show().siblings().hide().find('.dostavka_item.payment').removeClass('selected');
    $('.tabs .tab').eq(type).show().siblings().hide();
    $('.tabs').hide();
}

function setDelete(){
    cart.find('tr').each(function(){
            var element = $(this);
            var link = element.find('td.del a');
            link.click(function(e){
                ajaxParams.id = element.data('id');
                e.preventDefault();
                if(confirm("Вы действительно хотите удалить товар"))
                {
                    $.post('/cart/delete',ajaxParams,function(){
                        element.remove();
                        countCart();
                        location.href='/order/index';
                    });
                }
            });
        }
    );
}



$(function(){
    var basketContainer = $('#basket')
    // Табы в оформлении заказа
    $('.dostavka_block.payment-select').hide();
    $('.tab,.tabs').hide();


});
function scrollWindow()
{
    window.scrollTo(0,0)
}

