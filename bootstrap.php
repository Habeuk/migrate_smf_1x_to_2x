<?php
// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Habeuk\MigrateSmf1xTo2x\Configs\Params;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(paths: [
  __DIR__ . '/src/Entity'
], isDevMode: true);

// Configuring the database connection
$params = Params::getParamDb();
$connection = DriverManager::getConnection(
  [
    'driver' => 'pdo_mysql',
    'host' => $params['host'],
    'charset' => 'utf8',
    'user' => $params['user'],
    'password' => $params['password'],
    'dbname' => $params['dbname']
  ], $config);

// Obtaining the entity manager
$entityManager = new EntityManager($connection, $config); 