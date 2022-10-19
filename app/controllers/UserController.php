<?php

namespace app\controllers;

use app\models\User;
use myproject\libs\Pagination;

class UserController extends AppController{

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'],
                PASSWORD_DEFAULT);
                if($user->save('user')){
                    $_SESSION['success'] = 'Регистрация прошла успешно';
                    redirect('/user/login');
                }else{
                    $_SESSION['error'] = 'Ошибка';
                }
            }
            redirect();
        }
        $this->setMeta('Регистрация');

    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Вы успешно авторизованы';
            }else{
                $_SESSION['error'] = 'Логин/пароль введены неверно';
            }
            redirect();
        }
        $this->setMeta('Вход');

    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

    public function cabinetAction(){
        if(!User::checkAuth()) redirect();
        $this->setMeta('Личный кабинет');
    }

    public function editAction(){
        if(!User::checkAuth()) redirect('/user/login');
        if(!empty($_POST)){
            $user = new \app\models\admin\User();
            $data = $_POST;
            $data['id'] = $_SESSION['user']['id'];
            $data['role'] = $_SESSION['user']['role'];
            $user->load($data);
            if(!$user->attributes['password']){
                unset($user->attributes['password']);
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                redirect();
            }
            if($user->update('user', $_SESSION['user']['id'])){
                foreach($user->attributes as $k=>$v){
                    if($k!='password') $_SESSION['user']['$k'] = $v;
                }
                $_SESSION['success'] = 'Изменения сохранены';
            }
            redirect();
        }
        $this->setMeta('Изменение личных данных');
    }

    public function ordersAction(){
        if(!User::checkAuth()) redirect('/user/login');
        $orders = \R::findAll('order', 'user_id = ?', [$_SESSION['user']['id']]);
        $this->setMeta('История заказов');
        $this->set(compact('orders'));
    }

    public function viewAction(){
        $order_id = $this->getRequestID();
        $order = \R::getRow("SELECT `order`.*,  `user`.`name`, ROUND(SUM(`order_product`.`sum`), 2) AS `sum` FROM `order`
        JOIN `user` ON `order`.`user_id` = `user`.`id`
        JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
        WHERE `order`.`id`= ?
        GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT 1", [$order_id]);
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order_products = \R::findAll('order_product', 'order_id = ?', [$order_id]);
        $this->setMeta("Заказ №($order_id)");
        $this->set(compact('order', 'order_products'));
    }

    
    public function changemindAction(){
        $order_id = $this->getRequestID();
        $status = !empty($_GET['status']);
        $order = \R::load('order', $order_id);
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order->status = '2';
        $order->update_at = date("Y-m-d H:i:s");
        \R::store($order);
        $_SESSION['success'] = 'Заказ отменён';
        redirect();
    }
}