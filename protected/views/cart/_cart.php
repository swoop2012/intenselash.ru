<?php if(!empty($data)):?>
<table><tbody>
    <?php $count = count($data);?>
    <?php foreach ($data as $key=>$value):?>
        <tr>
            <td class="name">
                <?php echo CHtml::link($value['Name'],$this->createUrl('product/index',array('id'=>$value['idProduct'])));?>
                <div class="quantity"><?php echo $value['CountIn'].' '.$value['Measure'];?> </div>
            </td>
            <td class="total"><span><?php echo round($value['Count']*$value['Price']);?></span><div class="rubl">i</div></td>
        </tr>
    <?php endforeach;?>
    <tr>
        <!--	    <td class="name">
                    <span class="gift">Подарок</span>
                    <a href="#">Дженерик Виагра</a>
                    <div class="quantity">50 таблеток</div>
                </td>-->
        <td class="total">
            <div class="checkout"><?php echo CHtml::link(CHtml::image('/images/to_cart.png'),$this->createUrl('cart/index'));?></div>
        </td>
    </tr>
</tbody></table>
<?php endif;?>