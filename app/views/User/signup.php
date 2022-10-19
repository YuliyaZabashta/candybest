<div class="cart" style="margin-top: 30px;">
<h2>Регистрация</h2>	
<div class="cartorder">     
    <form method="post" action="user/signup" id="signup" role="form" data-toggle="validator">
        <div class="form-group has-feedback">
            <input type="text" name="login" class="form-control" id="login" placeholder="Логин" value="<?=isset($_SESSION['form_data']['login'])? h($_SESSION['form_data']['login']) : ''; ?>" required>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" id="pasword" placeholder="Пароль" data-error="Пароль должен включать не менее 6 символов" data-minlength="6" value="<?=isset($_SESSION['form_data']['password'])? h($_SESSION['form_data']['password']) : ''; ?>" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group has-feedback">
            <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="<?=isset($_SESSION['form_data']['name'])? h($_SESSION['form_data']['name']) : ''; ?>" required>
        </div>
        <div class="form-group has-feedback">
            <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="+7(999)999 99 99" data-minlength="12" maxlength="12" value="<?=isset($_SESSION['form_data']['telephone'])? h($_SESSION['form_data']['telephone']) : ''; ?>" required>
        </div>
        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?=isset($_SESSION['form_data']['email'])? h($_SESSION['form_data']['email']) : ''; ?>" required>
        </div>
        <div class="form-group has-feedback">
            <input type="text" name="address" class="form-control" id="address" placeholder="Адрес" value="<?=isset($_SESSION['form_data']['address'])? h($_SESSION['form_data']['address']) : ''; ?>" required>
        </div>
        <button type="submit" class="btn btnsuccess">Зарегистрировать</button>
    </form>
    <?php if(isset($_SESSION['form_data'])) unset ($_SESSION['form_data']); ?>            
</div>