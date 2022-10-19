<?php if(!empty($_SESSION['cart'])) : ?>
    <div class="cartblock_modal">
            <table class="carttable">
                <tbody>
                    <?php foreach($_SESSION['cart'] as $id=>$item): ?>
                    <tr>
                        <td><a href="product/<?=$item['alias']?>"><img src="/imagescandy/goods/<?=$item['img']?>"</a></td>
                        <td><a href="product/<?=$item['alias']?>"><?=$item['title']?></a></td>
                        <td>
                            <?=$item['qty']?>
                        </td> 
                        <td><?=$item['price']?></td>
                        <td><span class="del-item" data-id="<?=$id?>" aria-hidden="true">╳</span></a></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>Итого</td>
                        <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty']?></td>
                    </tr>
                    <tr>
                        <td>На сумму</td>
                        <td colspan="4" class="text-right cart-sum"><?=$_SESSION['cart.sum'] ?> руб</td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif;?>