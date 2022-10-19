<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
                Заказ №<?=$order['id'];?>
                <?php if($order['status'] =='0'):?>
                    <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=1" class="btn 
btn-success btn-xs">Одобрить</a>
                <?php elseif($order['status'] =='1'): ?>
                    <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=0" class="btn 
btn-default btn-xs">Вернуть на доработку</a>
                <?php endif;?>
                <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>" class="btn 
btn-danger btn-xs delete">Удалить</a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>/order">Список заказов</li></a>
              <li class="breadcrumb-item active">Заказ №<?=$order['id'];?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</section>
    <!-- /.content-header -->

    <!-- Main content -->
<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td>Номер заказа</td>
                                        <td><?=$order['id'];?></td>
                                    </tr> 
                                    <tr>
                                        <td>Дата заказа</td>
                                        <td><?=$order['date'];?></td>
                                    </tr>   
                                    <tr>
                                        <td>Дата изменения</td>
                                        <td><?=$order['update_at'];?></td>
                                    </tr>      
                                    <tr>
                                        <td>Количество позиций в заказе</td>
                                        <td><?=count($order_products); ?></td>
                                    </tr>   
                                    <tr>
                                        <td>Сумма заказа</td>
                                        <td><?=$order['sum'];?>руб</td>
                                    </tr>    
                                    <tr>
                                        <td>Имя заказчика</td>
                                        <td><?=$order['name'];?></td>
                                    </tr>   
                                    <tr>
                                        <td>Статус</td>
                                        <td><?//=$order['status'] ? 'Завершён' : 'Новый заказ';?>
                                            <?php 
                                            if($order['status'] == '1'){
                                                echo 'Завершён';
                                            }elseif($order['status'] == '2'){
                                                echo 'Отменён заказчиком';
                                            }else{
                                                echo 'Новый';
                                            }
                                            ?>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>Примечание</td>
                                        <td><?=$order['note'];?></td>
                                    </tr>                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h3>Детали заказа</h3>
                <div class="box">
                    <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Кол-во</th>
                                    <th colspan="2">Цена</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $qty=0; foreach($order_products as $product):?>
                                <tr>
                                    <td><?=$product->id;?></td>
                                    <td><?=$product->title;?></td>
                                    <td><?=$product->qty; $qty += $product->qty?></td>
                                    <td>
                                        <?=$product->price;?>
                                    </td>
                                    <?php if(count($order_products)>1):?>
                                    <td>
                                        <a href="<?=ADMIN;?>/order/cancellation?id=<?=$product['id'];?>" class="btn 
btn-danger btn-xs delete">Удалить</a>
                                    </td>
                                    <?php endif;?>
                                </tr>
                                <?php endforeach;?>
                                <tr class="active">
                                    <td colspan="2">
                                        <b>Итого:</b>
                                    </td>
                                    <td><b><?=$qty;?></b></td>
                                    <td><b><?=$order['sum'];?> руб</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <!-- /.content -->