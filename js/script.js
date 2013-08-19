/*
**	Author: Vladimir Shevchenko
**	URI: http://www.howtomake.com.ua/2012/stilizaciya-vsex-elementov-form-s-pomoshhyu-css-i-jquery.html 
*/

$(function(){
	//Reset form
	// Вешаем событие клика по кнопке сброса
	$('.reset-form').click(function() {
		// Устанавливаем пустое значение в атрибут value для всех инпутов
		$('.customForm').find('input').val('');
		
		// Убираем атрибут checked и класс активности у чекбоксов
		$('.customForm').find('input:checked').removeAttr('checked');
		$('.customForm').find('.check').removeClass('active');
		
		// Убираем класс активности у радио переключателей
		$('.customForm').find('.radio').removeClass('active');
		
		// Устанавливаем пустое значение в атрибут value для всех textarea
		$('.customForm').find('textarea').val('');
		
		// И для открывалки селекта возвращаем начальное значение
		$('.customForm').find('.slct').html('Выберите Ваше лучшее качество:');
	});
	
	// = Load
	// отслеживаем изменение инпута file
	$('#file').change(function(){
		// Если файл прикрепили то заносим значение value в переменную
		var fileResult = $(this).val();
		// И дальше передаем значение в инпут который под загрузчиком
		$(this).parent().find('.fileLoad').find('input').val(fileResult);
	});

	/* Добавляем новый класс кнопке если инпут файл получил фокус */
	$('#file').hover(function(){
		$(this).parent().find('button').addClass('button-hover');
	}, function(){
		$(this).parent().find('button').removeClass('button-hover');
	});
	
	// Checkbox
	// Отслеживаем событие клика по диву с классом check
	$('.checkboxes').find('.check').click(function(){
		// Пишем условие: если вложенный в див чекбокс отмечен
		if( $(this).find('input').is(':checked') ) {
			// то снимаем активность с дива
			$(this).removeClass('active');
			// и удаляем атрибут checked (делаем чекбокс не отмеченным)
			$(this).find('input').removeAttr('checked');
		
		// если же чекбокс не отмечен, то
		} else {
			// добавляем класс активности диву
			$(this).addClass('active');
			// добавляем атрибут checked чекбоксу
			$(this).find('input').attr('checked', true);
		}
	});
		
	// Select
	$('.slct').click(function(){
		/* Заносим выпадающий список в переменную */
		var dropBlock = $(this).parent().find('.drop');
		
		/* Делаем проверку: Если выпадающий блок скрыт то делаем его видимым*/
		if( dropBlock.is(':hidden') ) {
			dropBlock.slideDown();
			
			/* Выделяем ссылку открывающую select */
			$(this).addClass('active');
			
			/* Работаем с событием клика по элементам выпадающего списка */
			$('.drop').find('li').click(function(){
				
				/* Заносим в переменную HTML код элемента 
				списка по которому кликнули */
				var selectResult = $(this).html();
				
				/* Находим наш скрытый инпут и передаем в него 
				значение из переменной selectResult */
				$(this).parent().parent().find('input').val(selectResult);
				
				/* Передаем значение переменной selectResult в ссылку которая 
				открывает наш выпадающий список и удаляем активность */
				$('.slct').removeClass('active').html(selectResult);
				
				/* Скрываем выпадающий блок */
				dropBlock.slideUp();
			});
			
		/* Продолжаем проверку: Если выпадающий блок не скрыт то скрываем его */
		} else {
			$(this).removeClass('active');
			dropBlock.slideUp();
		}
		
		/* Предотвращаем обычное поведение ссылки при клике */
		return false;
	});	
		
	// RadioButton
    $('.sposob-oplati,#zakaz,#dannie,.forma-z').hide();
    $('.sposob-dostavki,.sposob-oplati').each(function(){
       var element = $(this);
       element.find('.checkblock .radio').click(function(){
           var radio = $(this);
           setActive(radio);
           if(element.hasClass('sposob-dostavki'))
               select_delivery(radio);
           else
               select_payment(radio);
       });
    });
    $(".minus,.plus").live('click',function () {
        var element = $(this);
        var parent  = element.parents('li');
        var $input = element.parent().find("input");
        var count = element.hasClass('plus')? parseInt($input.val())+1 : parseInt($input.val())-1;
        ajaxParams.sign =  element.hasClass('plus')? '+':'-';
        ajaxParams.id   = parent.data('id');
        if(count)
            $.post('/cart/change',ajaxParams);
        else
        count = 1;
        $input.val(count);
        $input.change();
        countCart();
        return false;
    });

    $('.recalculate').live('click',function(e){
        updateAjax();
        e.preventDefault();
    });

    $('.column-four .delete').live('click',function(e){
        var element = $(this);
        var parent  = element.parents('li');
        if(confirm("Вы действительно хотите удалить товар"))
        {
            ajaxParams.id = parent.data('id');
            $.post('/cart/delete',ajaxParams,function(){
                parent.remove();
                updateAjax();
            })
        }
        e.preventDefault();
    });

	function setActive(element){
        var valueRadio = element.html();
        element.parent().find('.radio').removeClass('active');
        element.addClass('active');
        element.parent().find('input').val(valueRadio);
    }

    function select_payment(element){
        var type = parseInt(element.data('type'))-1;
        ajaxParams.id = element.data('id');
        ajaxParams.type = 'payment';
        $.post('/order/setParam',ajaxParams);
        $('#zakaz,#dannie').show();
    }

    function select_delivery(element){
        var i = element.index();
        var type = parseInt(element.data('type'))-1;
        var payment =  $('.sposob-oplati .checkblock');
        var deliveryBlock = $('.delivery-block');
        deliveryBlock.find('.column-first .col').text(element.data('name'));
        deliveryBlock.find('.column-second .price').html('<span>' + element.data('price') + '</span> руб.');
        $('.sposob-oplati').show();
        ajaxParams.id = element.data('id');
        ajaxParams.type = 'delivery';
        $.post('/order/setParam',ajaxParams);
        payment.eq(i).show().siblings().hide().find('.radio').removeClass('active');
        $('#dannie .forma-z').eq(type).show().siblings('div').hide();
        $('#zakaz,#dannie').hide();
        countCart();
    }

    function countCart(){
        var totalPrice = 0;
        $('.buy-var-block').each(function(){
            var element = $(this);
            var countBlock = element.find('.col-t .number input').length? element.find('.col-t .number input').val():1;
            var count = parseInt(countBlock);
            var price = parseInt(element.find('.column-second .price span').text());
            if(!isNaN(count)&&!isNaN(price)){
                var res = count * price;
                totalPrice = totalPrice + res;
                element.find('.column-therd .nice-price span').text(res);
            }
        });
        $('.itog .full-itog span').text(totalPrice);
    }

    function updateAjax(){
        var form = $('#basket-form1');
        var container = $('ul.var-buy');
        $.post('/order/update',form.serialize(),function(data){
            if(data.success)
                container.html(data.content);
            else
                location.href = '/';
        },"json");
    }

    $('ul.var-buy li').each(function(){
        var element = $(this);
        var basketLink = element.find('div.column-four button.buy-min');
        var id = element.data('id');

        basketLink.bind('click',function(e){
            ajaxParams.id = id;
            $.post(basketLink.data('link'),ajaxParams,function(){
                location.href='/order/index';
            });

            e.preventDefault();
        });
    });

});