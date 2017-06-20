<?php

namespace PHPTest;

class Config
{

  private $_attributes;

  public function __construct($runtime_config = array()) {
    $this->_attributes = $runtime_config;
    $this->process();
  }

  public function __get($property) {
    return isset($this->_attributes[$property]) ? $this->_attributes[$property] : false;
  }

  public function __set($property, $value) {
    $this->_attributes[$property] = $value;
    return true;
  }

  public function __isset($property) {
    return isset($this->_attributes[$property]) ? true : false;
  }

  public function __unset($property) {
    unset($this->_attributes[$property]);
  }

  public function process() {
    $this->_attributes['app_root'] = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    $global_config = array();
    if (file_exists($this->app_root . 'config/main.json')) {
      $global_config = json_decode(file_get_contents($this->app_root . 'config' . DIRECTORY_SEPARATOR . 'main.json'), true);
    }
    $this->_attributes = array_merge((array)$global_config, (array)$this->_attributes);
    $this->web_root = $this->app_root . $this->theme;
    $this->upload_dir = $this->web_root . DIRECTORY_SEPARATOR . 'uploads';
    $this->controllers = $this->app_root . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'PHPTest' . DIRECTORY_SEPARATOR . 'Controllers';
    $this->models = $this->app_root . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'PHPTest' . DIRECTORY_SEPARATOR . 'Models';
    $this->views = $this->app_root . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'PHPTest' . DIRECTORY_SEPARATOR . 'Views';
  }

}
