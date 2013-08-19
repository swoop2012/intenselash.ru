<div id="oformlenie">

    <!--<h1>Заказ №<?php echo $order['orderNumber'];?></h1>
    <div class="pp-confirm">
        <p>Ваш заказ принят. Спасибо.</p>
		<p>Мы доставим ваш заказ: <?php echo $delivery->Name;?></p>
        <?php if(!empty($order['newPromo'])):?>
        <h3>Ваш персональный промо-код: <?php echo $order['newPromo'];?></h3>
		<p>У нас действуют накопительные промо-коды. Уже при следующем заказе указав ваш промо-код вы получите скидку — 5%. После 2-го заказа скидка будет увеличена до — 10%.</p>
        <?php endif;?>-->

<div id="zakaz-end">
    <h3>Заказ № <?php echo $order['orderNumber'];?></h3>
	<?php if(!empty($order['newPromo'])):?>
        <h3>Ваш персональный промо-код: <?php echo $order['newPromo'];?></h3>
		<p style="color:#ffffff;">У нас действуют накопительные промо-коды. Уже при следующем заказе указав ваш промо-код вы получите скидку — 5%. После 2-го заказа скидка будет увеличена до — 10%.</p>
        <?php endif;?>
    <div class="what-buy">
        <ul class="var-buy">
           <?php if(!empty($order['subproducts'])):?>
             <?php foreach($order['subproducts'] as $product):?>
		   <li>
            <div class="buy-var-block">
                <div class="column-first">
                    <div class="col"><? echo $product['CountIn'].' '.$product['Measure'];?></div>
                </div>
                <div class="col-t">

                    <div class="number">
                        
                        <input class="colvo" size="5" type="text" value="<? echo $product['Count'];?>" name="Basket[66][Count]" id="Basket_66_Count" readonly/>                       
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="column-second">
                    <div class="price"><span><? echo $product['Price']; ?></span> руб.</div>
                </div>
                <div class="column-therd">
                    <div class="nice-price"><span><? echo round($product['Count']*$product['Price']); ?></span> руб.</div>
                </div>
                <div class="column-four">
                    
                </div>

                <div class="clear"></div>
            </div>

        </li>
	<? endforeach;?>
<? endif;?>

<li class="delivery-block">
    <div class="buy-var-block">
            <div class="column-first">
            <div class="dosn">Доставка</div>
            <div class="col"><?php echo $delivery->Name;?></div>
        </div>
        <div class="col-t"></div>
        <div class="column-second">
            <div class="price"> </div>
            <div class="ekonomia"> </div>
        </div>
        <div class="column-therd">
            <div class="nice-price"><span><?php echo Calculate::DiscountDelivery($order['totalSum'],$delivery->Price,$delivery->FreeIf);?></span> руб.</div>
        </div>
        <div class="column-four">

        </div>

        <div class="clear"></div>
    </div>
</li>

<?php if(isset($order['Discount']['Discount'])):?>
	<li>
        <div class="buy-var-block">
            <div class="column-first">
                <div class="col">Скидка <?php echo $order['Discount']['Discount'];?>%</div>

            </div>
            <div class="col-t"></div>
            <div class="column-second">
                <div class="price"> </div>
            </div>
            <div class="column-therd">
                <div class="nice-price"><span>-<?php echo $order['discountSum']; ?></span> руб.</div>
            </div>
            <div class="column-four">

            </div>

            <div class="clear"></div>
        </div>
    </li>
<?php endif;?>

<?php if(!empty($bonus)):?>	
      <li>
        <div class="buy-var-block">
            <div class="column-first">
                <div class="col"><?php echo isset($bonus['Bonus'])?$bonus['Bonus']:'';?></div>

            </div>
            <div class="col-t"></div>
            <div class="column-second">
                <div class="price">Бонус при заказе</div>
            </div>
            <div class="column-therd">
                <div class="nice-price">Бесплатно</div>
            </div>
            <div class="column-four">

            </div>

            <div class="clear"></div>
        </div>
    </li>
<?php endif;?>
<li>
    <div class="itog">
        <div class="pereschet">
            <p> </p>
            <div class="form-pere">
                
            </div>
        </div>

        <div class="full-itog">
            Итого: <span><?php echo ($order['totalSum']+Calculate::DiscountDelivery($order['totalSum'],$delivery->Price,$delivery->FreeIf));?></span> руб.
        </div>

    </div>
</li>
        </ul>
        <div class="clear"></div>
    </div>
  </div>

<h2>Как оплатить <?php echo $payment->Name;?>?</h2>

<p  style="color:#ffffff;"><?php echo $payment->Description;?></p>

<div id="dannie-end">
<h2>Ваши данные для доставки</h2>
<div class="forma-z-end">
    <div class="pole-form">
        <div class="pole-name">
            Имя:
        </div>
        <div class="pole-inut">
            <?php echo $order['form']['fullName'];?>       </div>
        <div class="pole-comment">
                    </div>
        <div class="clear"></div>
    </div>

    <div class="pole-form">
        <div class="pole-name">
            Номер телефона:
        </div>
        <div class="pole-inut">
            <?php echo $order['form']['phone'];?>        </div>
        <div class="pole-comment">
                    </div>
        <div class="clear"></div>
    </div>
<?php if(!empty($order['form']['email'])):?>	
    <div class="pole-form">
        <div class="pole-name">
            Email:
        </div>
        <div class="pole-inut">
            <?php echo $order['form']['email'];?>        </div>
        <div class="pole-comment">
                   </div>
        <div class="clear"></div>
    </div>
<?php endif;?>
    <div class="pole-form">
        <div class="pole-name">
            Адрес:
        </div>
        <div class="pole-inut">
            <?php echo $order['form']['index'];?> <?php echo $order['form']['cityRegion'];?> <?php echo $order['form']['address'];?>      </div>
        <div class="pole-comment">
                    </div>
        <div class="clear"></div>
    </div>
<?php if(!empty($order['form']['comment'])):?>
    <div class="pole-form">
        <div class="pole-name">
            <p style="line-height:1.2;">Комментарии<br/>
                к заказу:</p>
                    </div>
        <div class="pole-inut">
            <?php echo $order['form']['comment'];?>
        </div>
        <div class="clear"></div>

   </div>
<?php endif;?>  
<div class="clear"></div>
  </div>
 </div>
 