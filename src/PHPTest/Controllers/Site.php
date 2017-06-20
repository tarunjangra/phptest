<?php

namespace PHPTest\Controllers;

use PHPTest\Helper;

class Site extends BaseController {
    public function actionIndex(){
        return $this->render(['view' => 'login']);
    }

    public function actionLogin(){

        if(isset($_REQUEST['posted_params'])) {
            Helper::see(Helper::modelFactory('Users'));
        }
        return $this->render(['view' => 'login']);
    }

    public function actionRegister(){
        Helper::see(Helper::modelFactory('Users'));
        if(isset($_REQUEST['posted_params'])) {
            Helper::modelFactory('Users')->insert();
        }
        return $this->render(['view' => 'register']);
    }
}