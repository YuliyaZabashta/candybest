<?php

namespace app\controllers\admin;

class MainController extends AppController{

    public function indexAction(){
        $countNewOrders = \R::count('order', "status = '0'");
        $countNewRequests = \R::count('feedback', "status = '0'");
        $countNewReviews = \R::count('gbook', "status = '0'");
        $countUsers = \R::count('user');
        $countProducts = \R::count('products');
        $this->setMeta('Панель управления');
        $this->set(compact('countNewOrders','countProducts','countUsers', 'countNewRequests', 'countNewReviews'));
    }

}