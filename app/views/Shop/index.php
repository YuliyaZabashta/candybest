<div class="shop">
    <p>Каталог товаров<p>
        <div class="search-bar">
            <form action="search" method="get" autocomplete="off">
		        <input type="text" class="typeahead" id="typeahead" name="s" placeholder="Поиск по каталогу">
		        <input type="submit" value="">
	        </form>
        </div>
    <?php if($hits):?>
    <?php foreach($hits as $hit):?>
    <a href="product/<?=$hit->alias;?>">
      <div class="shopUnit">
        <div class="shopUnitdisplay">
            <img src="imagescandy/goods/<?=$hit->img;?>">
        </div>
        <div class="shopUnithover">
            <div class="desc">
                <h3><?=$hit->title;?><br></h3>
                <a href="product/<?=$hit->alias;?>"><p style="margin-left: 50px;">Подробнее</p><br></a>
                
            </div>
            <div class="qty"></div>
            <div class="qty">
                <a title="Добавить" data-id="<?=$hit->id;?>" style="width: 40px; height: 40px; margin-top: -10px;" class="add-to-cart-link" href="cart/add?id=<?=$hit->id;?>"></a>
                
            </div>
            <b><?=$hit->price;?> руб</b>
        </div>
        <div class="shopDescmin">
            <p><?=$hit->title;?></p>
            <p><a title="Добавить" data-id="<?=$hit->id;?>" style="width: 60px; height: 60px; margin-top: -10px;" class="add-to-cart-link" href="cart/add?id=<?=$hit->id;?>"></a></p>
            <p> Цена: <?=$hit->price;?> руб</p>
        </div>
      </div>
    <?php endforeach;?>
    </a>
</div>
<div class="paginationshop">
	<!--<p>(<//=count($hits)?> товара(ов) из <?//=$total?>)</p>-->
	<?php if($pagination->countPages>1):?>
		<?=$pagination;?>
	<?php endif;?>
</div>
<?php endif;?>