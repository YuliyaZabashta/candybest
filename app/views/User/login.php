<div class="cart">
    <div class="cartorder">
    <form method="post" action="user/login" id="login" role="form" data-toggle="validator">
        <?php if(!isset($_SESSION['user'])): ?>
        <div class="spider _anim-items _anim-no-hide"></div>
        <div class="form-group has-feedback"><br>
            <input type="text" name="login" class="form-control" id="login" placeholder="Логин" required>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" id="password" placeholder="Пароль" required><br>
        </div>
        <div style="width: 160px; float:left;">
        <button type="submit" class="btnsuccess">Вход</button>
        <button type="submit" class="btn-defaultin" style="padding-left:50px; margin-top:10px;"><a href="user/signup">Регистрация</a></button>
        </div>
        <?php else: ?>
            <section class="helloblock _anim-items _anim-no-hide">
            <p>Добро пожаловать, <?=h($_SESSION['user']['name']);?><div class="cast _anim-items _anim-no-hide"></div></p>
            <div class="helloblock1 _anim-items _anim-no-hide"> <button type="submit" class="btn-defaultin"><a href="shop/index">К покупкам</a></button>
            </section>
        <?php endif; ?>
    </form>
</div>
					
				
			
		
	
	<!--product-end-->