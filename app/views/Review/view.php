<div class="shop">
    <p>Книга отзывов<p>
    <?php if($messages):?>
        <div class="reviewp" style="width: 98%;">
        <?php if(!empty($messages)): ?>
            <?php foreach($messages as $message): ?>
                <div class="messagesbook">
                <?=$message['name']?>  <?=$message['date']?>
                <div style="padding-top: 5px; border-top:1px solid #fff"><?=nl2br(htmlspecialchars($message['text']))?></div>
                </div>
            <?php endforeach; ?>
        <?php endif ?>
    </div>
</div>
<div class="paginationshop">
	<!--<p>(<//=count($messages)?> отзыва(ов) из <?//=$total?>)</p>-->
	<?php if($pagination->countPages>1):?>
		<?=$pagination;?>
	<?php endif;?>
</div>
<?php endif;?>