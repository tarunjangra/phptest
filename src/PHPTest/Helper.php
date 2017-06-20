<?php
/**
 * Created by PhpStorm.
 * User: tarunjangra
 * Date: 20/06/17
 * Time: 4:38 PM
 */

namespace PHPTest;


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

    /**
     * @return mixed current controller's instance
     */

    public static function controllerFactory(){
        global $app_config;
        $controller = ucwords(isset($_REQUEST['controller'])?$_REQUEST['controller']:'site');
        $ControllerObject = "\\PHPTest\\Controllers\\{$controller}";
        try {
            if(!class_exists($ControllerObject)){
                throw new \PHPTest\Controllers\Exceptions\NotFoundException("Sorry, No controller is available.");
            }
            $call_of_dynamic_controller = new $ControllerObject($app_config);
            $action_method =  ucwords(($_REQUEST['action']) ? $_REQUEST['action'] : 'index');
            $call_of_dynamic_controller->controller = strtolower($controller);
            $call_of_dynamic_controller->action = strtolower($action_method);
            $action = 'action'.$action_method;
            $action_output = $call_of_dynamic_controller->$action();
        }
        catch (\PHPTest\Controllers\Exceptions\NotFoundException $e){
            echo $e->getMessage().$e->getCode();
        }
        catch(\PDOException $e){
            if($e->getCode() == '2002') {
                echo "Database is not available.";
            }
        }

        return $action_output;
    }

    /**
     * @param $model Provide name of the model
     * @return mixed return available model instance
     */

    public static function modelFactory($model){
        global $app_config;
        $model = ucwords($model);
        $ModelObject = "\\PHPTest\\Models\\{$model}";
        try{
            if(!class_exists($ModelObject)){
                throw new \PHPTest\Models\Exceptions\NotFoundException("Sorry, No model is available.");
            }
        }
        catch(\PHPTest\Models\Exceptions\NotFoundException $e){
            echo $e->getMessage(). $e->getCode();
        }

        return new $ModelObject($app_config);

    }

}