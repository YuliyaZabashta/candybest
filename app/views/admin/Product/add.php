<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Новый товар</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item">Список товаров</li>
              <li class="breadcrumb-item active">Новый товар</li>
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
            <form method="post" action="<?=ADMIN;?>/product/add" data-toggle="validator" id="add">
            <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="title">Наименование товара</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Наименование товара"
value="<?php isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : null;?>" required><span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group">
                  <label for="keywords">Ключевые слова</label>
                  <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Ключевые слова" value="<?php isset($_SESSION['form_data']['keywords']) ? h($_SESSION['form_data']['keywords']) : null;?>">
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group">
                  <label for="desc">Описание</label>
                  <input type="text" name="desc" class="form-control" id="desc" placeholder="Описание" value="<?php isset($_SESSION['form_data']['description']) ? h($_SESSION['form_data']['description']) : null;?>">
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="price">Цена</label>
                  <input type="text" name="price" class="form-control" id="price" placeholder="Цена" pattern="^[0-9.]{1,}$" value="<?php isset($_SESSION['form_data']['price']) ? h($_SESSION['form_data']['price']) : null;?>" required data-error="Допускаются цифры и десятичная точка">
                  <div class="help-block with-errors"></div>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group">
                  <label>
                      <input type="checkbox" name="status" checked>Статус
                  </label>
                </div>
                <div class="form-group">
                  <label>
                      <input type="checkbox" name="hit">Хит
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
                        <div class="single"></div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
            </form> 
            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>         
      </div>
    </div>
  </div>
</section>
    <!-- /.content -->