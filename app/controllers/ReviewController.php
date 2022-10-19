<?php

namespace app\controllers;

use app\controllers\AppController;
use myproject\libs\Pagination;
use R;

class ReviewController extends AppController{

    public function indexAction(){
        $messages = R::getAll('SELECT * FROM gbook WHERE id>0 AND status=1 ORDER BY id DESC LIMIT 6');
        $this->setMeta('Гостевая книга');
        $this->set(compact('messages'));
        
    }

    public function viewAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 9;
        $count = \R::count('gbook', "status=1");
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $messages = \R::getAll("SELECT * FROM gbook WHERE id>0 AND status=1 ORDER BY id DESC LIMIT $start, $perpage");
        $this->setMeta('Гостевая книга');
        $this->set(compact('messages','pagination', 'count'));
    }
    
    public function savemessAction(){
        if(!empty($_POST)){
            if(isset($_SESSION['user'])){
            $name = $_SESSION['user']['name'];
            $text = $_POST['text'];
            if(!empty($_POST['text'])){
            \R::exec("INSERT INTO gbook (name,text) VALUES ('$name', '$text')");
            $_SESSION['success'] = 'Спасибо за отзыв';
            }else{
            $_SESSION['error'] = 'Полe не заполнено';  
            }
        }
        }
        redirect();
    }
   

}