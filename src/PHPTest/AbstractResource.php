<?php

namespace PHPTest;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

abstract class AbstractResource
{
  /**
   * @var \Doctrine\ORM\EntityManager
   */

  private $entityManager = null;

  /**
   * @return \Doctrine\ORM\EntityManager
   */

  public function getEntityManager() {
    if ($this->entityManager === null) {
      $this->entityManager = $this->createEntityManager();
    }

    return $this->entityManager;
  }

  /**
   * @return EntityManager
   */

  public function createEntityManager() {
    global $app_config;
    $devMode = true;
    $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../"), $devMode);

    // define credentials...
    $connectionOptions = array(
      'driver' => $app_config->driver,
      'host' => $app_config->hostname,
      'dbname' => $app_config->dbname,
      'user' => $app_config->username,
      'password' => $app_config->password,
      'path' => __DIR__.'/../../'.$app_config->path.$app_config->dbname
    );

    return EntityManager::create($connectionOptions, $config);
  }
}