<?php

namespace PHPTest\Controllers;

use PHPTest\Controllers\Exceptions\ValidationException;
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
            if($user){
                Helper::setSession('login',serialize($user));
                Helper::setSuccessFlashMessage("You are logged in successfully.");
                header("Location: /");
                exit;
            }else {
                throw new ValidationException("Invalid email/password combination.");
            }
        }

        return $this->render(['view' => 'login']);
    }

    public function actionRegister(){
        if(isset($_POST['posted_params'])) {

            if(!filter_var($_POST['posted_params']['email'],FILTER_VALIDATE_EMAIL)){
                throw new ValidationException("Invalid email id.");
            }

            if(strlen($_POST['posted_params']['password']) < 8){
                throw new ValidationException("Minimum password length should be 8.");
            }

            if($_POST['posted_params']['password'] != $_POST['posted_params']['repeat_password']){
                throw new ValidationException("Repeat password should be matched with password.");
            }
            $userParams = [
                "email" => $_POST['posted_params']['email'],
                "name" => $_POST['posted_params']['name'],
                "password" => $_POST['posted_params']['password'],
            ];
            $userResource = new UserResource();
            if($userResource->put($userParams)){
                Helper::setSuccessFlashMessage("You are successfully registered. Login below with email/password.");
                return $this->render(['view' => 'login']);
            }

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
        exit;
    }

}