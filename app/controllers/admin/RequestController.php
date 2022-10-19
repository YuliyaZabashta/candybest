<?php

namespace app\controllers\admin;

use myproject\libs\Pagination;

class RequestController extends AppController{

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 4;
        $count = \R::count('feedback');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $requests = \R::getAll("SELECT * FROM feedback WHERE id > 0 ORDER BY id DESC LIMIT $start, $perpage");
        $this->setMeta('Заявки');
        $this->set(compact('requests', 'pagination', 'count'));
        
    }

    public function changeAction(){
        $request_id = $this->getRequestID();
        $status = !empty($_GET['status']) ? '1' : '0';
        $request = \R::load('feedback', $request_id);
        if(!$request){
            throw new \Exception('Страница не найдена', 404);
        }
        $request->status = $status;
        \R::store($request);
        $_SESSION['success'] = 'Изменения сохранены';
        redirect();
    }

    public function deleteAction(){
        $request_id = $this->getRequestID();
        $request = \R::load('feedback', $request_id);
        \R::trash($request);
        $_SESSION['success'] = 'Заказ удалён';
        redirect(ADMIN . '/request/index'); 
    }

}