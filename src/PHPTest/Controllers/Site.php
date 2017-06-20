<?php

namespace PHPTest\Controllers;

use PHPTest\Helper;

class Site extends BaseController {
    public function actionIndex(){
        return $this->render(['view' => 'login']);
    }

    public function actionLogin(){
        return $this->render(['view' => 'login']);
    }

    public function actionRegister(){
        return $this->render(['view' => 'register']);
    }
}