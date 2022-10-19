<div class="cart" style="margin-top: 20px;">
    <?php //session_destroy();?>
    <?php if(!empty($_SESSION['cart'])): ?>
    <h2>Оформление заказа</h2>
        <div class="cartblock">
            <table class="carttable">
                <thead>
                    <tr>
                        <th style="width: 18%;">Фото</th>
                        <th style="width: 35%;">Наименование</th>
                        <th style="width: 26%;">Колич-во</th>
                        <th style="width: 14%;">Цена</th>
                        <th style="width: 7%;">╳</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_SESSION['cart'] as $id=>$item): ?>
                    <tr>
                        <td><a href="product/<?=$item['alias']?>"><img src="/imagescandy/goods/<?=$item['img']?>"></a></td>
                        <td><a href="product/<?=$item['alias']?>"><?=$item['title']?></a></td>
                        <td>
                            <?php if($item['qty']>1):?>
                            <div class="qty" style="margin-left:15px;">
                            <a data-id="<?=$id;?>" class="minus-to-cart-link" href="cart/minus?id=<?=$id?>"></a>
                            </div>
                            <div class="qty" style="padding: 5px 10px 0px;">
                            <?=$item['qty']?>
                            </div>
                            <div class="qty">
                            <a data-id="<?=$id;?>" class="add-to-cart-link" href="cart/add?id=<?=$id?>"></a>
                            </div>
                            <?php else:?>
                            <div class="qty" style="margin-left:15px;"></div>
                            <div class="qty" style="padding: 5px 10px 0px;">
                            <?=$item['qty']?>
                            </div>
                            <div class="qty">
                            <a data-id="<?=$id;?>" class="add-to-cart-link" href="cart/add?id=<?=$id?>"></a>
                            </div>
                            <?php endif;?>
                        </td> 
                        <td><?=$item['price']?></td>
                        <td><a title="Убрать из корзины" href="/cart/delete/?id=<?=$id?>"><span data-id="<?=$id?>" style="color: red;">╳</span></a></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>Итого</td>
                        <td colspan="4" class="text-left cart-qty"><?=$_SESSION['cart.qty']?></td>
                    </tr>
                    <tr>
                        <td>На сумму</td>
                        <td colspan="4" class="text-left cart-sum"><?=$_SESSION['cart.sum'] ?> руб</td>
                    </tr>
                </tbody>
            </table>
        </div><br>
            <?php //debug($_SESSION) ?>
            <form method="post" action="cart/checkout" role="form" data-toggle="validator">
                <?php if(!isset($_SESSION['user'])): ?>
                    <button type="submit" class="btn-defaultin" style="padding-left: 21px;"><a href="user/login">Войти и оформить</a></button>    
                <?php else: ?>
                    <div class="note">
                    <label for="address">Пожелания к заказу</label>
                    <textarea name="note"></textarea>
                </div>
                    <button type="submit" class="btnsuccess">Оформить</button>
            </form>
        <?php endif; ?>
            <?php if(isset($_SESSION['form_data'])) unset ($_SESSION['form_data']); ?>
            <a style="text-decoration: none; color:#fff; font-size: 22px; margin-left:10px;" href="shop/index"> &#8592; Вернуться к покупкам</a>
            <?php else: ?>
                <h3><br><br>Корзина пуста</h3>
            <?php endif; ?>
</div>