<div class="product-page">
	<h1><?php echo $model->Name;?><br><span><?php echo $model->ShortDescriptionMain;?></span></h1>
	<div class="pp-product">
		<div class="product-left">
			<a class="product-img" href="#">
				<?php echo CHtml::image(Image::Check($model->PictureProduct1));?>
			</a>
			<div class="previews">
				<?php echo CHtml::link(CHtml::image(Image::Check($model->PictureProduct2)));?>
				<?php echo CHtml::link(CHtml::image(Image::Check($model->PictureProduct3)));?>
			</div>
		</div>
		<div class="product-right">
			<div class="pp-top">
				<?php echo $model->ShortDescription;?>
			</div>
		</div>
        <div class="store">
        <?php if(!empty($model->subproduct)):?>
		<img src="/images/store-yes.png" alt=""/>товар в наличии
        <?php else:?>
        Нет в наличии
        <?php endif;?>
        </div>
        <?php echo $model->MiddleDescription;?>

        <?php if(!empty($bonuses)):?>
		<div class="pp-advert">
		<div class="title">Не определились?</div>
		<p>Чтобы убедится в качестве, и определится с выбором конкретного препарата советуем заказать <a href="/tabletki/nabor-probnik.html">набор-пробник «Классический»</a>.</p>
			<div class="title">Бонусы</div>
            <?php foreach($bonuses as $bonus):?>
			<p><b> <?php echo $bonus->Bonus;?></b><br />
			При сумме заказа от <?php echo round($bonus->ConditionSum);?> р.</p>
            <?php endforeach;?>
		</div>
        <?php endif;?>

		<div class="pp-products">
			<?php if(!empty($model->subproduct)):?>
			<h4>Купить <?php echo $model->Name;?></h4>
			<?php foreach($model->subproduct as $value):?>
			<div class="product" data-id="<?php echo $value->id;?>">
				<div class="p-left">
					<div class="count"><b><?php echo $value->Count;?></b> <?php echo $value->Measure;?></div>
					<div class="price"><?php
                        //$price = Calculate::getPrice($value->Price,$model->UpPrice);
                        echo $price = Calculate::getPrice($value->Price,$model->UpPrice);
                        ?><div class="rubl">i</div></div>
					<div class="one"><b><?php echo Calculate::Devide($price, $value->Count);?><span class="rubl">i</span></b> за таблетку</div>
				</div>
				<div class="p-right">
					<?php echo CHtml::link(CHtml::image('/images/add_to_cart.png'),$this->createUrl('addProduct'),array('class'=>'basket-link','onclick'=>'scrollWindow()'));?>
					<?php echo CHtml::link('Оформить сразу',$this->createUrl('/order/index'),array('class'=>'order-link'));?>
				</div>
			</div>
			<?php endforeach;?>
			<?php endif;?>

		</div>													
	</div>
</div>
<div class="text">
    <?php echo $model->Article;?>
</div>