<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование товара:<br> <?=$product->title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item">Список товаров</li>
              <li class="breadcrumb-item active">Редактирование</li>
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
            <form method="post" action="<?=ADMIN;?>/product/edit" data-toggle="validator">
            <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="title">Наименование товара</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Наименование товара"
value="<?=h($product->title);?>" required><span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group">
                  <label for="keywords">Ключевые слова</label>
                  <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Ключевые слова" value="<?=h($product->keywords);?>">
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group">
                  <label for="desc">Описание</label>
                  <input type="text" name="desc" class="form-control" id="desc" placeholder="Описание" value="<?=h($product->desc);?>">
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="price">Цена</label>
                  <input type="text" name="price" class="form-control" id="price" placeholder="Цена" pattern="^[0-9.]{1,}$" value="<?=$product->price;?>" required data-error="Допускаются цифры и десятичная точка">
                  <div class="help-block with-errors"></div>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group">
                  <label>
                      <input type="checkbox" name="status"<?=$product->status ? ' checked' : null;?>>Статус
                  </label>
                </div>
                <div class="form-group">
                  <label>
                      <input type="checkbox" name="hit"<?=$product->hit ? ' checked' : null;?>>Хит
                  </label>
                </div>
                
                <div class="form-group">
                  <div class="col-md-4">
                    <div class="card card-danger file-upload">
                      <div class="card-header">
                        <h3 class="card-title">Базовое изображение</h3>
                      </div>
                      <div class="card-body">
                        <div id="single" class="btn btn-success" data-url="product/add-image" data-name="single">Выбрать файл</div>
                        <p><small>Рекомендуемые размеры: 220х220</small></p>
                        <div class="single">
                            <img src="/imagescandy/goods/<?=$product->img;?>" alt="" style="max-haight: 150px;">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="box-footer">
                <input type="hidden" name="id" value="<?=$product->id;?>">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
            </form>          
      </div>
    </div>
  </div>
</section>
    <!-- /.content -->