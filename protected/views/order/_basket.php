<? if(!empty($basket)):?>
    <? foreach($basket as $product):?>
        <li data-id="<?=$product['id'];?>">
            <div class="buy-var-block">
                <div class="column-first">
                    <div class="col"><?= $product['CountIn'].' '.$product['Measure']?></div>
                </div>
                <div class="col-t">

                    <div class="number">
                        <div class="minus">&nbsp</div>
                        <?=CHtml::textField('Basket['.$product['id'].'][Count]',$product['Count'],array('class'=>'colvo','size'=>5))?>
                        <div class="plus">&nbsp</div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="column-second">
                    <div class="price"><span><?=$product['Price']?></span> руб.</div>
                </div>
                <div class="column-therd">
                    <div class="nice-price"><span><?=round($product['Count']*$product['Price'])?></span> руб.</div>
                </div>
                <div class="column-four">
                    <button class="delete"></button>
                </div>

                <div class="clear"></div>
            </div>

        </li>
    <? endforeach;?>
<? endif;?>
<? if(Order::checkDiscountProduct($order)):?>
    <li>
        <div class="buy-var-block">
            <div class="column-first">
                <div class="col"><?= $order['Discount']['NameProduct'];?></div>

            </div>
            <div class="col-t">Промо-товар</div>
            <div class="column-second">
                <div class="price"><span><?= round($order['Discount']['PromoPrice']);?></span> руб.</div>
            </div>
            <div class="column-therd">
                <div class="nice-price"><span><?= round($order['Discount']['PromoPrice']);?></span> руб.</div>
            </div>
            <div class="column-four">

            </div>

            <div class="clear"></div>
        </div>
    </li>
<? endif;?>
<? if(!empty($bonus)):?>
    <li>
        <div class="buy-var-block">
            <div class="column-first">
                <div class="col"><?= isset($bonus['Bonus'])?$bonus['Bonus']:'';?></div>

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
<? endif;?>
<li class="delivery-block">
    <div class="buy-var-block">
    <? $flag = isset($delivery) && !empty($delivery) ?>
        <div class="column-first">
            <div class="dosn">Доставка</div>
            <div class="col"><?= $flag ? $delivery->Name:''?></div>
        </div>
        <div class="col-t"></div>
        <div class="column-second">
            <div class="price"><?= $flag ? '<span>'.round($delivery->Price).'</span> руб.':''?> </div>
            <div class="ekonomia"> </div>
        </div>
        <div class="column-therd">
            <div class="nice-price"><span><?= $flag ? round($delivery->Price):''?></span> руб.</div>
        </div>
        <div class="column-four">

        </div>

        <div class="clear"></div>
    </div>
</li>
<? if(isset($order['Discount']['Discount'])&&$order['Discount']['Discount'] > 0):?>
<li>
    <div class="buy-var-block">
        <div class="column-first">
            <div class="dosn">Скидка <?= $order['Discount']['Discount'];?>%</div>
            <div class="col"></div>
        </div>
        <div class="col-t"></div>
        <div class="column-second">
            <div class="price"> </div>
            <div class="ekonomia"> </div>
        </div>
        <div class="column-therd">
            <div class="nice-price"><span>-<?= round($order['discountSum']);?></span> руб.</div>
        </div>
        <div class="column-four">

        </div>

        <div class="clear"></div>
    </div>
    <? endif;?>
<li>
    <div class="itog">
        <div class="pereschet">
            <p>После первого заказа вы получите код,
                дающий скидку 5% на все последующие заказы.</p>
            <div class="form-pere">
                <?= CHtml::textField('promo',isset($order['Discount'])?$order['Discount']['Promo']:'',array('onblur'=>"if(this.value=='')this.value=this.defaultValue;",'onfocus'=>"if(this.value==this.defaultValue)this.value='';"))?>
                <a href="/" class='recalculate'>Пересчитать</a>
            </div>
        </div>

        <div class="full-itog">
            Итого: <span><?= $flag?round($order['totalSum']+$delivery->Price):$order['totalSum'];?></span> руб.
        </div>

    </div>
</li>