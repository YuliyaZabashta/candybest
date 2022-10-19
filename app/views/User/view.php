<div class="cart">
<h3 style="font-weight: bold;"><br>Детали заказа <?=$order['id'];?>
<a style="font-weight: lighter;" href="user/orders"> &#8592; К истории заказов</a>
<?php if($order['status'] =='0'):?><a class="btn-defaultin" style="width: 150px; padding-top:10px; float:right; color:#56433D;" href="user/changemind?id=<?=$order['id'];?>&status=1">Отменить заказ</a><br>
<?php endif;?>
</h3><br>
    <table class="carttable">
        <thead>
            <tr>
                <th>Статус</th>
                <th>Дата создания</th>
                <th>Дата изменения</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if($order['status'] == '1'){
                $class = 'success';
                $text = 'Завершён';
            }elseif($order['status'] == '2'){
                $class = 'info';
                $text = 'Отменён';
            }else{
                $class = '';
                $text = 'Новый';
            }
        ?>
                <tr>
                    <td><?=$text;?></td>
                    <td><?=$order['date'];?></td>
                    <td><?=$order['update_at'];?></td>
                </tr>
        </tbody>
    </table>
    <hr>
    <div class="cartblock" style="height: 350px;">
    <table class="carttable">
        <thead>
            <tr>
                <th style="width: 20%;">Фото</th>
                <th style="width: 36%;">Наименование</th>
                <th style="width: 12%;">Кол-во</th>
                <th style="width: 16%;">Цена</th>
                <th style="width: 16%;">Сумма</th>
            </tr>
        </thead>
        <tbody>
            <?php $qty=0; foreach($order_products as $product):?>
            <tr>
            <td><a href="product/<?=$product['alias']?>"><img src="/imagescandy/goods/<?=$product['img']?>"></a></td>
                <td><a href="product/<?=$product['alias']?>"><?=$product->title;?></a></td>
                <td><?=$product->qty; $qty += $product->qty?></td>
                <td><?=$product->price;?></td>
                <td><?=$product->sum;?></td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td style="text-align: right;">
                    <b>Итого:</b>
                </td>
                <td colspan="4"><b><?=$qty;?></b></td>
            </tr>
            <tr>
                <td style="text-align: right;">
                    <b>На сумму:</b>
                </td>
                <td colspan="4"><b><?=$order['sum'];?>руб</b></td>
            </tr>
        </tbody>
    </table>
    <div>
</div>