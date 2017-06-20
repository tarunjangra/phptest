<?php
session_start();
use \PHPTest\Helper;
require_once __DIR__ . '/../bootstrap.php';
Helper::controllerFactory($app_config);