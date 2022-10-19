<div class="review" style="margin-top: 65px; ">
    <p style="font-size: 33px;"><b>Любой праздник ярче с Candibest</b></p>
    <div class="itcss">
        <div class="itcss__wrapper">
            <div class="itcss__items">
                <?php foreach($images as $image):?>
                <div class="itcss__item"><img src="imagescandy/goods/<?=$image->img;?>"></div>
                <?php endforeach;?>
            </div>
            <a class="itcss__control itcss__control_prev" href="#" role="button" data-slide="prev"></a>
            <a class="itcss__control itcss__control_next" href="#" role="button" data-slide="next"></a>
        </div>
    </div>
</div>
<div class="cart">
    <div class="service">
        <ul>Наши услуги
            <li>&#10003; Организация дней рождений</li>
            <li>&#10003; Проведение тематических вечеринок</li>
            <li>&#10003; Фотосессии</li>
            <li>&#10003; Квесты</li>
        </ul>
    </div>
    <div class="service">
        <form action="service/feedback" method="POST" data-toggle="validator">
        <?php if(!isset($_SESSION['user'])): ?>  
            <p>Оставьте заявку и <br>мы ответим на все Ваши вопросы</p>
            <div class="form-group has-feedback">
            <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="<?=isset($_SESSION['form_data']['name'])? h($_SESSION['form_data']['name']) : ''; ?>" required>
            </div>
            <div class="form-group has-feedback">
            <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="+7(999)999 99 99" data-minlength="12" maxlength="12" value="<?=isset($_SESSION['form_data']['telephone'])? h($_SESSION['form_data']['telephone']) : ''; ?>" required>
            </div>
            <?php else:?>
            <p><br>Оставьте заявку и <br>мы ответим на все Ваши вопросы</p>
            <?php endif;?> 
            <div class="form-group has-feedback">
            <input type="note" name="note" class="form-control" id="note" placeholder="Здесь можно задать вопрос" value="<?=isset($_SESSION['form_data']['note'])? h($_SESSION['form_data']['note']) : ''; ?>">
            </div>
            <button type="submit" class="btnsuccess">Отправить заявку</button>
         
        </form>
    </div>
</div>