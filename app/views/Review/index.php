<div class="review">
        <h3><b>Отзывы покупателей</b></h3>
        <div class="reviewp">
        <?php if(!empty($messages)): ?>
            <?php foreach($messages as $message): ?>
                <div class="messages">
                <p><?=$message['name']?>  <?=$message['date']?></p>
                <div><?=nl2br(htmlspecialchars($message['text']))?></div>
                </div>
            <?php endforeach; ?>
        <?php endif ?>
    </div>
</div>
<div class="cart">
    <div class="cartorder">
        <p><br><br><b>Нам важно мнение любимых покупателей! <br>Оставьте свой отзыв -<br>это поможет нам совершенствоваться для Вас!</b></p>
        <form action="review/savemess" method="POST">
        <?php if(!isset($_SESSION['user'])): ?>
            <p><br><b>Оставить отзыв могут лишь авторизованные пользователи</b></p>
            <button type="submit" class="btn-defaultin"><a href="user/login">Авторизоваться</a></button><br>   
        <?php else: ?>
                    <div class="note">
                <label for="text">Ваш отзыв</label>
                <textarea name="text" id="text"></textarea>
            </div>
            <button type="submit" class="btnsuccess">Разместить</button>
        <?php endif;?>  
        </form>
        
        <div class="maus _anim-items _anim-no-hide"></div> 
    </div>
    <a href="review/view" class="allreview">Все отзывы &#8594;</a>
</div>
