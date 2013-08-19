<div id="dannie">
<h2>Заполните данные для доставки</h2>
<div class="forma-z">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'order-form1',
        'enableAjaxValidation'=>true,
        'clientOptions' => array(
            'validateOnSubmit'=>true,
            'validateOnChange'=>true,
            'validateOnType'=>false,
        ),
    )); ?>
    <?php echo $form->hiddenField($model,'typeDelivery',array('value'=>1));?>
    <div class="pole-form">
        <div class="pole-name vajno">
            Полное ФИО:
        </div>
        <div class="pole-inut">
            <?php echo $form->textField($model,'fullName',array('class'=>'zak-frm')); ?>
        </div>
        <div class="pole-comment">
            <?php echo $form->error($model,'fullName'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="pole-form">
        <div class="pole-name vajno">
            Номер телефона:
        </div>
        <div class="pole-inut">
            <?php echo $form->textField($model,'phone',array('class'=>'zak-frm')); ?>
        </div>
        <div class="pole-comment">
            <p>Вам позвонят из службы доставки
                для подтверждения заказа.</p>
            <?php echo $form->error($model,'phone'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="pole-form">
        <div class="pole-name">
            Email:
        </div>
        <div class="pole-inut">
            <?php echo $form->textField($model,'email',array('class'=>'zak-frm')); ?>
        </div>
        <div class="pole-comment">
            <p>Для информирования о статусе
                заказа и получения кодов на скидку.</p>
            <?php echo $form->error($model,'email'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="pole-form">
        <div class="pole-name vajno">
            Город, область:
        </div>
        <div class="pole-inut">
            <?php echo $form->textField($model,'cityRegion',array('class'=>'zak-frm')); ?>
        </div>
        <div class="pole-comment">
            <p>Например, г. Киров,
                Кировская область</p>
            <?php echo $form->error($model,'cityRegion'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="pole-form">
        <div class="pole-name vajno">
            Индекс:
        </div>
        <div class="pole-inut">
            <?php echo $form->textField($model,'index',array('class'=>'zak-frm')); ?>
        </div>
        <div class="pole-comment">
            <?php echo $form->error($model,'index'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="pole-form">
        <div class="pole-name vajno">
            Адрес:
        </div>
        <div class="pole-inut">
            <?php echo $form->textField($model,'address',array('class'=>'zak-frm')); ?>
        </div>
        <div class="pole-comment">
            <p style="line-height:30px;">Например: ул. Ленина 1, кв. 1</p>
            <?php echo $form->error($model,'address'); ?>
        </div>
        <div class="clear"></div>
    </div>


    <div class="pole-form">
        <div class="pole-name">
            <p style="line-height:1.2;">Комментарии<br/>
                к заказу:</p>
            <?php echo $form->error($model,'comment'); ?>
        </div>
        <div class="pole-inut">
            <?php echo $form->textArea($model,'comment',array('class'=>'zak-tex')); ?>
            <div class="clear"></div>
            <div class="obyans"><span>*</span> Звездочкой помечены поля, обязательны для заполнения.</div>

            <button class="send-zakaz"></button>

        </div>
        <div class="clear"></div>

    </div>
    <?php $this->endWidget();?>
</div>
<div class="forma-z">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'order-form2',
        'enableAjaxValidation'=>true,
        'clientOptions' => array(
            'validateOnSubmit'=>true,
            'validateOnChange'=>true,
            'validateOnType'=>false,
        ),
    )); ?>
    <?php echo $form->hiddenField($model,'typeDelivery',array('value'=>2));?>
    <div class="pole-form">
        <div class="pole-name vajno">
            Имя:
        </div>
        <div class="pole-inut">
            <?php echo $form->textField($model,'fullName',array('class'=>'zak-frm')); ?>
        </div>
        <div class="pole-comment">
            <?php echo $form->error($model,'fullName'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="pole-form">
        <div class="pole-name vajno">
            Номер телефона:
        </div>
        <div class="pole-inut">
            <?php echo $form->textField($model,'phone',array('class'=>'zak-frm')); ?>
        </div>
        <div class="pole-comment">
            <p>Вам позвонят из службы доставки
                для подтверждения заказа.</p>
            <?php echo $form->error($model,'phone'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="pole-form">
        <div class="pole-name">
            Email:
        </div>
        <div class="pole-inut">
            <?php echo $form->textField($model,'email',array('class'=>'zak-frm')); ?>
        </div>
        <div class="pole-comment">
            <p>Для информирования о статусе
                заказа и получения кодов на скидку.</p>
            <?php echo $form->error($model,'email'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="pole-form">
        <div class="pole-name vajno">
            Адрес:
        </div>
        <div class="pole-inut">
            <?php echo $form->textField($model,'address',array('class'=>'zak-frm')); ?>
        </div>
        <div class="pole-comment">
            <p style="line-height:30px;">Например: Москва, ул. Ленина 1, кв. 1</p>
            <?php echo $form->error($model,'address'); ?>
        </div>
        <div class="clear"></div>
    </div>


    <div class="pole-form">
        <div class="pole-name">
            <p style="line-height:1.2;">Комментарии<br/>
                к заказу:</p>
            <?php echo $form->error($model,'comment'); ?>
        </div>
        <div class="pole-inut">
            <?php echo $form->textArea($model,'comment',array('class'=>'zak-tex')); ?>
            <div class="clear"></div>
            <div class="obyans"><span>*</span> Звездочкой помечены поля, обязательны для заполнения.</div>

            <button class="send-zakaz"></button>

        </div>
        <div class="clear"></div>

    </div>
    <?php $this->endWidget();?>
</div>
</div>

<div class="clear"></div>