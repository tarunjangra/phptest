<?php
namespace PHPTest\Models;
abstract class BaseModel {
    protected $db;
    protected $table;
    protected $config;
    function __construct(&$config){
        $this->config = $config;
        $this->db = new \PDO("mysql:host={$this->config->hostname};dbname={$this->config->dbname}",
            $this->config->username, $this->config->password);
        $this->table = strtolower(array_pop(explode('\\',get_class($this))));
    }
}