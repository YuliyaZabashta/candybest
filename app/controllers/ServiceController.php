<?php

namespace app\controllers;

class ServiceController extends AppController{

    public function indexAction(){
        $images = \R::findAll('gallery', "LIMIT 8");
        $this->setMeta('Услуги');
        $this->set(compact('images'));
        
    }

    public function feedbackAction(){
        if(!empty($_POST)){
            if(!isset($_SESSION['user'])){
            $name = $_POST['name'];
            $telephone = $_POST['telephone'];
            }else{
            $name = $_SESSION['user']['name'];
            $telephone = $_SESSION['user']['telephone'];
            }
            $note = $_POST['note'];
            if(isset($name) && isset($telephone)){
            \R::exec("INSERT INTO feedback(name,telephone, note) VALUES ('$name', '$telephone','$note')");
            $_SESSION['success'] = 'Спасибо за заявку, мы свяжемся с Вами в ближайшее время';
            }
        }
        redirect();
    }
}