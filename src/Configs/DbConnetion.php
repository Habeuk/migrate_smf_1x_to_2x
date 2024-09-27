<?php

namespace Habeuk\MigrateSmf1xTo2x\Configs;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

/**
 * Document importat à lire.
 *
 * @see https://www.doctrine-project.org/projects/doctrine-orm/en/3.2/reference/advanced-configuration.html
 * @author stephane
 *        
 */
class DbConnetion {
  /**
   *
   * @var \Doctrine\ORM\EntityManager
   */
  private static $entityManager;
  
  /**
   *
   * @return \Doctrine\ORM\EntityManager
   */
  public static function EntityManager() {
    if (!self::$entityManager) {
      // Create a simple "default" Doctrine ORM configuration for Attributes
      $config = ORMSetup::createAttributeMetadataConfiguration(paths: [
        __DIR__ . '/src/Entity'
      ], isDevMode: true);
      
      // Configuring the database connection
      $params = Params::getParamDb();
      $connection = [
        'driver' => 'pdo_mysql',
        'host' => $params['host'],
        'charset' => 'utf8',
        'user' => $params['user'],
        'password' => $params['password'],
        'dbname' => $params['dbname']
      ];
      $orm_connect = DriverManager::getConnection($connection, $config);
      if (!empty($params['prefix_table'])) {
        $evm = new \Doctrine\Common\EventManager();
        $tablePrefix = new \Habeuk\MigrateSmf1xTo2x\DoctrineExtensions\TablePrefix($params['prefix_table']);
        $evm->addEventListener(\Doctrine\ORM\Events::loadClassMetadata, $tablePrefix);
        self::$entityManager = new EntityManager($orm_connect, $config, $evm);
      }
      else
        self::$entityManager = new EntityManager($orm_connect, $config);
    }
    return self::$entityManager;
  }
}
