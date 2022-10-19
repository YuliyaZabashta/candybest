<div class="cart">
    <div class="cartorder">
        <form action="/user/edit" method="post" data-toggle="validator">
                <div class="form-group has-feedback">
                    <br>
                    <input type="text" class="form-control" name="login" id="login" value="<?=h($_SESSION['user']['login']); ?>" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль, если хотите его изменить">
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="name" id="name" value="<?=h($_SESSION['user']['name']); ?>" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="tel" class="form-control" name="telephone" id="telephone" value="<?=h($_SESSION['user']['telephone']); ?>" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" id="email" value="<?=h($_SESSION['user']['email']); ?>" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="address" id="address" value="<?=h($_SESSION['user']['address']); ?>" required>
                </div>
            <div class="box-footer">
                <button type="submit" class="btnsuccess">Сохранить</button>
            </div>
        </form>
	</div>
</div>	
			
		
