<?php

namespace PHPTest\Controllers;

use PHPTest\Helper;

class Site extends BaseController {
    public function actionIndex(){
        return $this->render(['view' => 'login']);
    }

    public function actionLogin(){
        $users = Helper::modelFactory('Users');
        Helper::see($users);
        return $this->render(['view' => 'login']);
    }

    public function actionRegister(){
        return $this->render(['view' => 'register']);
    }
}