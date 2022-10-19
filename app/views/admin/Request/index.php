<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список заявок</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item active">Список заявок</li>
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
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Имя</th>
                                        <th>Телефон</th>
                                        <th>Примечание</th>
                                        <th>Статус</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($requests as $request):?>
                                        <?php $class = $request['status'] ? 'success' : ''; ?>
                                    <tr class="<?=$class;?>">
                                        <td><?=$request['id'];?></td>
                                        <td><?=$request['name'];?></td>
                                        <td><?=$request['telephone'];?></td>
                                        <td><?=$request['note'];?></td>
                                        <td><?=$request['status'] ? 'Завершён':'Новый';?></td>
                                        <td><h1>
                <?php if(!$request['status']):?>
                    <a href="<?=ADMIN;?>/request/change?id=<?=$request['id'];?>&status=1" class="btn 
btn-success btn-xs">Одобрить</a>
                <?php else: ?>
                    <a href="<?=ADMIN;?>/request/change?id=<?=$request['id'];?>&status=0" class="btn 
btn-default btn-xs">Вернуть на доработку</a>
                <?php endif;?>
                <a href="<?=ADMIN;?>/request/delete?id=<?=$request['id'];?>" class="btn 
btn-danger btn-xs delete">Удалить</a>
            </h1></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>(<?=count($requests);?> заявок(ов) из <?=$count?>)</p>
                            <?php if($pagination->countPages > 1) : ?>
                                <?=$pagination?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <!-- /.content -->