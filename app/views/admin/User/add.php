<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Новый пользователь</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>/user">Список пользователей</a></li>
              <li class="breadcrumb-item active">Новый пользователь</li>
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
                    <form method="post"  action="/user/signup" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Логин</label>
                                <input class="form-control" name="login" id="login"
type="text" value="<?=isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '' ?>" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="password">Пароль</label>
                                <input class="form-control" name="password" id="password"
type="password" data-minlenght="6" data-error="Пароль должен включать не менее 6 символов" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input class="form-control" name="email" id="email"
type="email" value="<?=isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '' ?>" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" name="name" id="name"
value="<?=isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '' ?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">Адрес</label>
                                <input type="text" class="form-control" name="address" id="address"
value="<?=isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label >Роль</label>
                                <select name="role" class="form-control">
                                    <option value="user">Пользователь</option>
                                    <option value="admin">Администратор</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Номер телефона</label>
                                <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="+7(999)999 99 99" data-minlength="12" maxlength="12" value="<?=isset($_SESSION['form_data']['telephone'])? h($_SESSION['form_data']['telephone']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
                </div>
            </div>
        </div>
</section>
    <!-- /.content -->