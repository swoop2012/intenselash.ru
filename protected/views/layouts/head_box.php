<div class="head-box">
    <div class="menu">
        <ul>
            <? $mainPage = substr_count($this->route,'site/index');?>
            <li <?= $mainPage ? 'class="active"':''?>>
                <?=CHtml::link('O Careprost','/')?>
            </li>
            <li <?= !$mainPage ? 'class="active"':''?>>
                <?=CHtml::link('Купить',($mainPage?'':'/').'#buy')?>
            </li>
            <li>
                <?=CHtml::link('Доставка и оплата',($mainPage?'':'/').'#dostavka-oplata')?>
            </li>

            <li>
                <?=CHtml::link('Инструкция',($mainPage?'':'/').'#instructions')?>

            </li>
            <li>
                <?=CHtml::link('Вопросы и ответы',($mainPage?'':'/').'#vopros-contact')?>
            </li>
            <li>
                <?=CHtml::link('Контакты',($mainPage?'':'/').'#vopros-contact')?>
            </li>
        </ul>
    </div>
    <div class="telephone">
        <ul>
            <li class="tel-txt">Горячая линия: </li>
            <li class="number">
                <?=$this->phone?>
                <?if (!empty($this->wmid)):?>
                    доб. <?= $this->wmid;?>
                <?endif;?>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
</div>