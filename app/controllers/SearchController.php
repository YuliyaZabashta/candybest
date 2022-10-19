<?php

namespace app\controllers;

use myproject\App;
use myproject\libs\Pagination;

class SearchController extends AppController{

    public function typeaheadAction(){
        if($this->isAjax()){
            $query=!empty(trim($_GET['query']))?trim($_GET['query']):null;
            if($query){
                $products=\R::getAll("SELECT id, title FROM products WHERE title LIKE 
            ? AND status = 'on' LIMIT 8", ["%{$query}%"]);
                echo json_encode($products);
            }
        }
        die;
    }

    public function indexAction(){
        $query=!empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if($query){
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perpage = App::$app->getProperty('pagination');
            $total = \R::count('products', "title LIKE ?", ["%{$query}%"]);
            $pagination = new Pagination($page, $perpage, $total);
            $start = $pagination->getStart();
            $products = \R::find('products', "title LIKE ?", ["%{$query}%"],  "LIMIT $start, $perpage");
        }
        $this->setMeta('Поиск по:'. h($query));
        $this->set(compact('products', 'query','pagination', 'total'));
    }

}