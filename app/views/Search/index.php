<div class="shop">
	<p style="font-size:36px ;">Поиск по запросу <br>"<?=h($query);?>"</p>
    <div class="search-bar">
        <form action="search" method="get" autocomplete="off">
		    <input type="text" class="typeahead" id="typeahead" name="s" placeholder="Поиск по каталогу">
		    <input type="submit" value="">
	    </form>
    </div>
    <br>
    <?php if(!empty($products)): ?>
        <?php foreach($products as $product): ?>
    <a href="product/<?=$product->alias;?>">
    <div class="shopUnit">
        <div class="shopUnitdisplay">
            <img src="imagescandy/goods/<?=$product->img; ?>">
        </div>
        <div class="shopUnithover">
            <div class="desc">
                <h3><?=$product->title;?><br></h3>
                <a href="product/<?=$product->alias;?>"><p style="margin-left: 50px;">Подробнее</p><br></a>
                
            </div>
            <div class="qty"></div>
            <div class="qty">
                <a title="Добавить" data-id="<?=$product->id;?>" style="width: 40px; height: 40px; margin-top: -10px" class="add-to-cart-link" href="cart/add?id=<?=$product->id;?>"></a>
            </div>
            <b><?=$product->price;?> руб</b>
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

