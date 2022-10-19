<?php

namespace app\controllers;

use myproject\Cache;

class MainController extends AppController{

    public function indexAction(){
        $hits = \R::find('products', "hit='1' AND status ='1' LIMIT 8");
        $this->setMeta('Candybest - Главная', 'Описание...', 'Ключевики...');
        $this->set(compact('hits'));

    }
}