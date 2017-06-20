<?php
namespace PHPTest\Models;
use PHPTest\Helper;

abstract class BaseModel {
    protected $db;
    protected $table;
    protected $config;
    function __construct(&$config){
        $this->config = $config;
        echo $dns = "mysql:host={$this->config->hostname};dbname={$this->config->dbname}";
        $this->db = new \PDO($dns, $this->config->username, $this->config->password);
        $this->table = strtolower(array_pop(explode('\\',get_class($this))));
    }

    public function insert(){

    }

    public function get(){
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    /**
     * @param null $id id of row what you want to delete.
     * @return \PDOStatement
     */
    public function delete($id = null){
        if($id) {
            return $this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
        }
    }
}