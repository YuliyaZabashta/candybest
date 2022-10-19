<div class="cart" style="height: 550px;">
    <h3>История заказов</h3><br>
    <div class="cartblock" style="height: 500px;">
    <div class="cartorder">
        <?php if($orders): ?>
            <table class="carttable">
                <thead>
                    <tr>
                        <th style="width: 15%;">Номер заказа</th>
                        <th style="width: 27%;">Статус</th>
                        <th style="width: 50%;">Дата создания</th>
                        <th style="width: 8%; padding:0px 3px 0px;">Состав</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order): ?>
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
                        <td><?=$order->id;?></td>
                        <td><?=$text;?></td>
                        <td><?=$order->date;?></td>
                        <td><a  class="magnifyingglass" title="Просмотреть" href="user/view?id=<?=$order['id'];?>"><img style="border: none; margin:0;" src="./imagescandy/eye.png"></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="font-size: 24px;">Вы пока не совершали заказов...</p>
            <button type="submit" class="btn-defaultin"><a href="shop/index">К покупкам</a></button>
        <?php endif;?>
	</div>	
    </div>
</div>