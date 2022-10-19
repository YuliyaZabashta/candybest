<div class="openedProduct">
<a href="shop/index"> &#8592; К каталогу</a>
<?php if($product):?>
	<div class="mainProduct">
    	<img src="imagescandy/goods/<?=$product['img'];?>">
		<div id="openedProduct-content">
    		<h1 id="openedProduct-name">
    		<?php echo $product['title']; ?>
    		</h1>
    		<div id="openedProduct-desc">
    			<?php echo $product['desc']; ?>
    		</div>
    		<div id="openedProduct-price">
        		Цена: <?php echo $product['price']; ?>
    		</div> 
            <a title="Добавить" data-id="<?=$product->id;?>" class="add-to-cart-link" href="cart/add?id=<?=$product->id;?>"></a>
		</div>
	</div>
		<h3><b>Недавно просмотренные:</b></h3> 
        <?php foreach($recentlyViewed as $item): ?>
		<a href="product/<?=$item['alias'];?>">
			<div class="viewedProduct">
				<div id="openedProduct-img">
					<img src="imagescandy/goods/<?=$item['img'];?>" alt="" />
				</div>
				<div id="openedProduct-content">
					<p><?=$item['title'];?><br><?=$item['price'];?>руб</p>
				</div>
			</div>
		</a>
        <?php endforeach; ?>
	
<?php endif;?>
</div>