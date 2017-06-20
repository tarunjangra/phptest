<?php

namespace PHPTest\Controllers;

use PHPTest\Helper;
use PHPTest\Resources\UserResource;

class Site extends BaseController {

    public function actionIndex(){
        if($user = Helper::getLoggedInUser()){
            return $this->render(['view' => 'dashboard', 'user' => $user]);
        }
        return $this->render(['view' => 'home']);
    }

    public function actionLogin(){
        if(isset($_POST['posted_params'])) {
            $userResource = new UserResource();
            $user = $userResource->getByEmailAndPassword($_POST['posted_params']['email'],$_POST['posted_params']['password']);
            Helper::setSession('login',serialize($user));
            if($this->action == 'login'){
                header("Location: /");
            }else{
                header("Location: ".$_SERVER[HTTP_REFERER]);
            }
        }else {
            return $this->render(['view' => 'login']);
        }
    }

    public function actionRegister(){
        if(isset($_REQUEST['posted_params'])) {

            Helper::see(Helper::modelFactory('Users',"select * from users"));
        }
        return $this->render(['view' => 'register']);
    }

    public function actionSearch(){
        if(!Helper::gateway()){
            return $this->render(['view' => 'login','message' => "You can not access search without login!"]);
        }
        $userResource = new UserResource();
        $users = $userResource->getByEmailOrName($_POST['posted_params']['term']);
        return $this->render(['view' => 'search_results', 'users' => $users]);
    }

    public function actionLogout(){
        unset($_SESSION['login']);
        header("Location: /");
    }
}