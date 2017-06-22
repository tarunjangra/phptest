<?php

namespace PHPTest\Controllers;
use PHPTest\Controllers\Exceptions\NotFoundException;
use PHPTest\Helper;

abstract class BaseController
{
    public $layout = 'layout';
    public $config;
    private $_attributes;

    public function __construct(&$config) {
        $this->config=$config;
    }

    public function __get($property) {
        return isset($this->_attributes[$property]) ? $this->_attributes[$property] : false;
    }

    public function __set($property, $value) {
        $this->_attributes[$property] = $value;
        return true;
    }

    public function __call($name, $arguments)
    {
        throw new NotFoundException("Sorry, Route is not available.");
    }

    public function render($params = array()){
        $default = ['posted_params' => $_REQUEST['posted_params']];
        $params = $params + $default;
        extract($params);
        include($this->config->web_root.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.$this->layout.'.php');
    }

}