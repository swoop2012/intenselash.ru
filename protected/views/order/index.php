<div id="oformlenie">
    <h2>Оформление заказа</h2>

    <div class="sposob-dostavki">
        <h3>Способ доставки</h3>

        <div class="checkblock">
            <? if(!empty($delivery)):?>
                <? foreach($delivery as $value):?>
                        <div class="radio" data-id="<?= $value->id;?>" data-type="<?= $value->Type;?>" data-name="<?= $value->Name?>" data-price="<?= round($value->Price)?>">
                            <p class="name-dos"><?= $value->Name;?></p>
                            <p class="city"><?= $value->Instruction;?></p>
                            <p class="price-dos"><?= round($value->Price);?> рублей</p>
                        </div>
                <? endforeach;?>
            <? endif;?>
            <div class="clear"></div>

            <input type="hidden" id="radion" value=" ">
        </div>



    </div>

    <div class="sposob-oplati">
        <h3>Способ оплаты</h3>
        <? if(!empty($delivery)):?>
            <? foreach($delivery as $value):?>
                <? if(!empty($value->payment_api)):?>
                    <div class="checkblock">
                            <? foreach($value->payment_api as $deliverypayment):?>
                                <div  class="radio" data-id="<?= $deliverypayment->id;?>">
                                    <p class="name-dos"><?= $deliverypayment->Name;?></p>
                                    <p class="tip-opl"><?= $deliverypayment->ShortDescription;?></p>
                                </div>
                            <? endforeach;?>
                        <div class="clear"></div>
                        <input type="hidden" id="radion" value=" ">
                    </div>
                <? endif;?>
            <? endforeach;?>
        <? endif;?>
    </div>
</div>

<div class="clear"></div>

<div id="zakaz">
    <h3>Вы заказали</h3>
    <? $form=$this->beginWidget('CActiveForm', array(
        'id'=>'basket-form1',
    )); ?>
    <div class="what-buy">
        <ul class="var-buy">
            <? $this->renderPartial('_basket',compact('order','basket','bonus'))?>

        </ul>
        <div class="clear"></div>
    </div>
    <? $this->endWidget();?>
</div>

<div class="clear"></div>
<? $this->renderPartial('_form',compact('model'));?>


