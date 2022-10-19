<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends AppController{
    
    public function viewAction(){
        $alias = $this->route['alias'];
        $product = \R::findOne('products', "alias = ? AND status = 'on'", [$alias]);
        if(!$product){
            throw new \Exception('Cтраница не найдена', 404);
        };

        //связанные товары
        //$related = \R::getAll("SELECT*FROM related_product JOIN product ON product.id = related_id 
        //WHERE related_product.product_id = ?", [$product->id]);

        //запись в куки запрошенного товара
        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);

        //просмотренные товары
        $r_viewed = $p_model->getRecentlyViewed();
        $recentlyViewed = null;
        if($r_viewed){
            $recentlyViewed = \R::find('products', 'id IN ('.\R::genSlots($r_viewed).') LIMIT 3', $r_viewed);
        }    

        //галерея
        //$gallery = \R::findAll('gallery', 'product_id=?', [$product->id]);

        //модификации
        //$mods = \R::findAll('modification', 'product_id =?', [$product->id]);
        
        

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'recentlyViewed'));
    }

}