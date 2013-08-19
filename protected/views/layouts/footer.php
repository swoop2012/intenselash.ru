<div id="footer">

    <div class="info-footer">
        <p>&copy; 2010 &mdash; <?=date('Y');?> Intense Lash<br/>
            Все права защищены</p>

        <p><?=$this->phone?>
            <?if (!empty($this->wmid)):?>
                доб. <?= $this->wmid;?>
            <?endif;?><br/>
            
        </p>

    </div>

    <div class="counter">
        <img src="/images/counter.png" border="0" />
    </div>
    <div class="clear"></div>
</div>