<?php
/**
 * Created by PhpStorm.
 * User: tarunjangra
 * Date: 20/06/17
 * Time: 4:38 PM
 */

namespace PHPTest;


use PHPTest\Controllers\Exceptions\NotFoundException;

class Helper
{
    public static function see($var, $var_dump = false){
        echo "<pre>";
        if($var_dump){
            var_dump($var);
        }else {
            print_r($var);
        }
        echo "</pre>";
    }

    public static function factory(&$config){
        $controller = ucwords(isset($_REQUEST['controller'])?$_REQUEST['controller']:'site');
        $ControllerObject = "\\PHPTest\\Controllers\\{$controller}";
        try {
            if(!class_exists($ControllerObject)){
                throw new NotFoundException("Sorry, No controller is available.");
            }
            $call_of_dynamic_controller = new $ControllerObject($config);
            $action_method =  ucwords(($_REQUEST['action']) ? $_REQUEST['action'] : 'index');
            $call_of_dynamic_controller->controller = strtolower($controller);
            $call_of_dynamic_controller->action = strtolower($action_method);
            $action = 'action'.$action_method;
            $action_output = $call_of_dynamic_controller->$action();
        }catch (\Exception $e){
            echo $e->getMessage();
        }

        return $action_output;
    }

}