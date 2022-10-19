<?php

namespace app\controllers\admin;

use app\models\admin\Product;
use app\models\AppModel;
use GuzzleHttp\Promise\Is;
use myproject\App;
use myproject\libs\Pagination;

class ProductController extends AppController{

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('products');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $products = \R::getAll("SELECT products.* FROM products
     ORDER BY products.title LIMIT $start, $perpage");
        $this->setMeta('Список товаров');
        $this->set(compact('products', 'pagination', 'count'));
    }

    public function addImageAction(){
        if(isset($_GET['upload'])){
            if($_POST['name'] == 'single'){
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');
            }
            $name = $_POST['name'];
            $product = new Product();
            $product->uploadImg($name, $wmax, $hmax);
        }
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->getImg();
            if(!$product->validate($data)){
                $product->getErrors();
                redirect();
            }
            if($product->update('products', $id)){
                $product->saveGallery($id);
                $alias = AppModel::createAlias('products', 'alias', $data['title'], $id);
                $status = (int)$_POST['status'];
                $product->status = $status;
                $product = \R::load('products', $id);
                $product->alias = $alias;
                \R::store($product);
                $_SESSION['success'] = 'Изменения сохранены';
                redirect();
            }
        }
        $id = $this->getRequestID();
        $product = \R::load('products', $id);
        $gallery = \R::getCol('SELECT img FROM gallery WHERE id = ?', [$id]);
        $this->setMeta("Редактирование товара {$product->title}");
        $this->set(compact('product', 'gallery'));
    }

    public function addAction(){
        if(!empty($_POST)){
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->getImg();

            if(!$product->validate($data)){
                $product->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            if($id = $product->save('products')){
                $product->saveGallery($id);
                $alias = AppModel::createAlias('products', 'alias', $data['title'], $id);
                $p = \R::load('products', $id);
                $p->alias = $alias;
                \R::store($p); 
                $_SESSION['success'] = 'Товар добавлен';
            }
            redirect();
        }
        $this->setMeta('Новый товар');
    }

    public function deleteAction(){
        $id = $this->getRequestID();
        $product = \R::load('products', $id);
        \R::trash($product);
        $_SESSION['success'] = 'Товар удалён';
        redirect();
    }

    
    /*public function deleteGalleryAction(){
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        if(!$id || !$src){
            return;
        }
        if(\R::exec("DELETE FROM gallery WHERE product_id = ? AND img = ?", [$id, $src])){
            @unlink(WWW . "/images/$src");
            exit('1');
        }
        return;
    }*/
}