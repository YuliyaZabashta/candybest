<!DOCTYPE html>
<html lang="ru">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/candystyle1.css">
    <link rel="icon" type="image/png" sizes="512x512" href="/imagescandy/favicon.png">
    <?=$this->getMeta();?>
    <title>Candybest</title>
</head>
<body>
    <header>
        <?//php session_destroy();?>
        <div class="container">
            <div id="headerInside">
                <div id="navWrap">
                    <a href="<?=PATH;?>"><div id="logo"></div><span class="logotyp">CANDYBEST</span></a>
                    <?php if(!empty($_SESSION['user'])): ?>
                        <div class="bigmenu">
                            <div class="btn-group">
                                <a class="dropdown-toggle" data-toggle="dropdown">Привет,  <?=$_SESSION['user']['name'];?>! <span class="caret"></span></a>
                                <ul class="dropdown-menu">   
                                <li><a href="user/orders">Мои заказы</a></li>	
                                <li><a href="user/edit">Редактировать профиль</a></li>
                                <li><a href="user/logout">Выход</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="hamburger-menu">
                            <input id="menu__toggle" type="checkbox" />
                            <label class="menu__btn" for="menu__toggle">
                            <span></span>
                            </label>
                            <ul class="menu__box">
                                <li class="menu__item">
                                    <div class="btn-group">
                                        <a class="dropdown-toggle" data-toggle="dropdown">Привет,  <?=$_SESSION['user']['name'];?>! <span class="caret"></span></a>
                                        <ul class="dropdown-menu">   
                                        <li><a href="user/orders">Мои заказы</a></li>	
                                        <li><a href="user/edit">Редактировать профиль</a></li>
                                        <li><a href="user/logout">Выход</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
					<?php else: ?>
                        <div class="bigmenu">
                            <a href="user/login">Вход</a>
                        </div>
                       <div class="hamburger-menu">
                            <input id="menu__toggle" type="checkbox" />
                            <label class="menu__btn" for="menu__toggle">
                            <span></span>
                            </label>
                            <ul class="menu__box">
                                <li class="menu__item">
                                    <div class="btn-group">
                                    <a href="user/login">Вход</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
					<?php endif; ?>
                    <!--<a href="user/login">Вход</a>-->
                            <a href="cart/show" onclick="getCart(); return false" data-target="#cart">
								<?php if(!empty($_SESSION['cart'])): ?>
                                    <img src="./imagescandy/cart.png" class="basket">
                                    <span class="simpleCart_qty"><?=$_SESSION['cart.qty']?></span>
								    <span class="simpleCart_total"><?=$_SESSION['cart.sum']?> руб</span>	
								<?php else: ?>
                                    <img src="./imagescandy/cartempty.png" class="basket">
									<span class="simpleCart_total">Корзина пуста</span>
								<?php endif; ?>
						    </a>
                    <!--<a href="cart/view"><img src="./imagescandy/basket.png" class="basket"></a>-->
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                    <?php if(isset($_SESSION['error'])): ?>
						<div class="alert alert-danger">
							<?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
						</div>
					<?php endif; ?>
					<?php if(isset($_SESSION['success'])): ?>
						<div class="alert alert-success">
							<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
						</div>
					<?php endif; ?>
                <?=$content;?>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer_box">
                <br>
                <span> ⓒ 2022 CANDYBEST</span>
                <hr>
                <ul class="contacts"><span><b>Покупателям</b></span>
                    <li><a href="#">Акции</a></li>
                    <li><a href="#">Доставка</a></li>
                </ul>
                
                <ul class="contacts"><span><b>О компании</b></span>
                    <li><a href="#">Вакансии</a></li>
                    <li><a href="#">Благотворительный<br> фонд</a></li>
                </ul>

                <ul class="contacts"><span><b>Обратная связь</b></span>
                    <li><a href="#">Telegram</a></li>
                    <li><a href="#">Vk</a></li>
                </ul>
                
            </div>
        </div>
    </footer>

    <div class="modal fade" id="cart" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel">
        <div class="modal-dialog model-ld" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();" aria-label="Close"><span aria-hidden="true" style="color: white">╳</span></button>
                    <?php if(!empty($_SESSION['cart'])) : ?>
                        <h4 class="modal-title" id="myModalLabel">Товары в корзине</h4>
                    <?php endif;?>
                </div>
                <div class="modal-body">
        
                </div>
                <div class="modal-footer">
                <?php if(empty($_SESSION['cart'])) : ?>
                    <a href="shop/index"><button type="button" class="btn-defaultin">К покупкам</button></a>
                <?php else:?>
                    <a href="shop/index"><button type="button" class="btn-defaultin">Продолжить покупки</button></a>
                    <a href="cart/view"><button type="button" class="btnsuccess">Оформить заказ</button></a>
		            <button title="Очистить корзину" class="btn-clear" onclick="clearCart()"></button>
                <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <div id="pop-up">
        <div>
            <p><b>Добрый день/вечер/ночь! :)</b></p>
            <p>Данный проект - учебный, создан при освоении автором<br>практических задач, предназначен для демонстрации в НЕКОММЕРЧЕСКИХ целях. Для создания сайта были использованы материалы из публичного доступа сети Интернет (картинки, шрифты, фото, видеоуроки, форумы, курс "PHP-Мастер. От теории <br>до собственной CMS интернет-магазина").<br> Данный сайт вымышленной организации, и он не имеет никакого отношения к представленным на нём фото, товарам, людям</p>
            <button type="button" onclick="popYes()"><b>Ясненько</b></button>
        </div>
    </div>
    <script defer src="js/simple-adaptive-slider.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
      // инициализация слайдера
      var slider = new ItcSimpleSlider('.itcss', {
        loop: true,
        autoplay: true,
        swipe: true
      });
    });
    </script>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/validator.js"></script>
	<script src="js/typeahead.bundle.js"></script>
    <script src="js/my.js" type="text/javascript"></script>
    <script src="js/jquery.easydropdown.js"></script>	
    <script src="js/typeahead.bundle.js"></script>
</body>
</html>