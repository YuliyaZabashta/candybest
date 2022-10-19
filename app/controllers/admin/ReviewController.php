<?php

namespace app\controllers\admin;

use myproject\libs\Pagination;

class ReviewController extends AppController{

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 4;
        $count = \R::count('gbook');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $messages = \R::getAll("SELECT * FROM gbook WHERE id > 0 ORDER BY id DESC LIMIT $start, $perpage");
        $this->setMeta('Отзывы');
        $this->set(compact('messages', 'pagination', 'count'));
        
    }

    public function changeAction(){
        $message_id = $this->getRequestID();
        $status = !empty($_GET['status']) ? '1' : '0';
        $message = \R::load('gbook', $message_id);
        if(!$message){
            throw new \Exception('Страница не найдена', 404);
        }
        $message->status = $status;
        \R::store($message);
        $_SESSION['success'] = 'Изменения сохранены';
        redirect();
    }

    public function deleteAction(){
        $message_id = $this->getRequestID();
        $message = \R::load('gbook', $message_id);
        \R::trash($message);
        $_SESSION['success'] = 'Заказ удалён';
        redirect(ADMIN . '/review/index'); 
    }

}
   
