<?php

namespace app\controllers;

use myproject\App;
use myproject\Cache;
use myproject\libs\Pagination;

class ShopController extends AppController{

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = \R::count('products', "status ='on'");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $hits = \R::find('products', "hit='on' AND status ='on' LIMIT $start, $perpage");
        $this->setMeta('Каталог');
        $this->set(compact('hits','pagination', 'total'));
    
    }
}