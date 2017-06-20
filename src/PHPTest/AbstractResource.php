<?php
/**
 * Created by PhpStorm.
 * User: tarunjangra
 * Date: 21/06/17
 * Time: 1:35 AM
 */

namespace PHPTest;


use Medoo\Medoo;

class AbstractResource
{
    private static $db = false;
    public function getEntityManager(){
        global $app_config;
        if(self::$db){
            return self::$db;
        }
        self::$db = new Medoo(
            [
                'database_type' => 'mysql',
                'database_name' => $app_config->dbname,
                'server' => $app_config->hostname,
                'username' => $app_config->username,
                'password' => $app_config->password
            ]
        );
        return self::$db;
    }

}