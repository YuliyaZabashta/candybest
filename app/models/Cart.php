<?php

namespace app\models;

use myproject\App;

class Cart extends AppModel{
    public function addToCart($product, $qty = 1, $mod = null){
        if($mod){
            $ID = "{$product->id}-{$mod->id}";
            $title = "{$product->title}({$mod->title})";
            $price = $mod->price;
        }else{
            $ID = $product->id;
            $title = $product->title;
            $price =  $product->price;
        }
        if(isset($_SESSION['cart'][$ID])){
            $_SESSION['cart'][$ID]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$ID] = [
                'qty'=>$qty,
                'title'=>$title,
                'alias'=>$product->alias,
                'price'=>$price,
                'img'=>$product->img,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty 
        : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty 
        * $price : $qty * $price;
    }

    public function deleteItem($id){
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }
    public function minusItem($id, $qty){
        $minusQty = $_SESSION['cart'][$id]['qty'] - $qty;
        $_SESSION['cart'][$id]['qty'] = $minusQty;
        if($_SESSION['cart'][$id]['qty']<=0){
            unset($_SESSION['cart'][$id]);
        }
        $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - $qty;
        if($_SESSION['cart.qty']<=0){
            unset($_SESSION['cart.qty']);
        }
        $minusSum = $_SESSION['cart.sum'] - ($_SESSION['cart'][$id]['price'] * $qty);
        $_SESSION['cart.sum'] = $minusSum;
    }

}
