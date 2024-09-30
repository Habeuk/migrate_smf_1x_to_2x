<?php

namespace Habeuk\MigrateSmf1xTo2x\Configs;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Query\Expr\Select;

/**
 * Document importat à lire.
 *
 * @see https://www.doctrine-project.org/projects/doctrine-orm/en/3.2/reference/advanced-configuration.html
 * @author stephane
 *        
 */
class DbConnection {
  /**
   * La clee permettant de regrouper les données de la BD.
   *
   * @var string
   */
  protected $key_database = 'default';
  /**
   *
   * @var \Doctrine\ORM\EntityManager
   */
  private static $entityManager = [];
  /**
   *
   * @var \Doctrine\DBAL\Connection
   */
  private static $connection = [];
  /**
   *
   * @var \Doctrine\ORM\Configuration
   */
  private static $entityConfig = [];
  /**
   *
   * @var QueryBuilderHelper
   */
  private static $queryBuilder = [];
  
  function __construct($key_database = 'default') {
    $this->key_database = $key_database;
  }
  
  /**
   * Cette connexion contient des functions facilitant la manipulation des
   * données.
   *
   * @return QueryBuilderHelper
   */
  public static function connectionQueryBuilder($key = 'default') {
    if (@!self::$queryBuilder[$key]) {
      $connectManager = new self($key);
      $params = $connectManager->getDataBaseConfig();
      $QueryBuilderHelper = new QueryBuilderHelper($connectManager->connection());
      if (!empty($params['prefix_table'])) {
        $QueryBuilderHelper->setPrefixTable($params['prefix_table']);
      }
      self::$queryBuilder[$key] = $QueryBuilderHelper;
    }
    return self::$queryBuilder[$key];
  }
  
  /**
   *
   * @return \Doctrine\DBAL\Connection
   */
  public function connection() {
    if (@!self::$connection[$this->key_database]) {
      $config = $this->getEntityConfig();
      // Configuring the database connection
      $params = $this->getDataBaseConfig();
      $connection = [
        'driver' => 'pdo_mysql',
        'host' => $params['host'],
        'charset' => 'utf8',
        'user' => $params['user'],
        'password' => $params['password'],
        'dbname' => $params['dbname']
      ];
      self::$connection[$this->key_database] = DriverManager::getConnection($connection, $config);
    }
    return self::$connection[$this->key_database];
  }
  
  /**
   *
   * @return \Doctrine\ORM\EntityManager
   */
  public static function EntityManager($key = 'default') {
    if (@!self::$entityManager[$key]) {
      $connectManager = new self($key);
      $config = $connectManager->getEntityConfig();
      $params = $connectManager->getDataBaseConfig();
      $orm_connect = $connectManager->connection();
      if (!empty($params['prefix_table'])) {
        $evm = new \Doctrine\Common\EventManager();
        $tablePrefix = new \Habeuk\MigrateSmf1xTo2x\DoctrineExtensions\TablePrefix($params['prefix_table']);
        $evm->addEventListener(\Doctrine\ORM\Events::loadClassMetadata, $tablePrefix);
        self::$entityManager[$key] = new EntityManager($orm_connect, $config, $evm);
      }
      else
        self::$entityManager[$key] = new EntityManager($orm_connect, $config);
    }
    return self::$entityManager[$key];
  }
  
  /**
   * Utile pour surcharger la configuration.
   * Cela permet d'etendre facilement ce fichier de connexion et d'avoir
   * plusieurs connexion vers differente BD.
   *
   * @return string[]
   */
  public function getDataBaseConfig() {
    $params = Params::getParamDb();
    if (@$params[$this->key_database])
      return $params[$this->key_database];
    throw new \Exception("La clée de la base de donnée '$this->key_database' n'existe pas.");
  }
  
  public function getDataBaseConfigKey($key) {
    $params = $this->getDataBaseConfig();
    if (!empty($params[$key]))
      return $params[$key];
    throw new \Exception("La clée '$key' n'existe pas.");
  }
  
  /**
   *
   * @return \Doctrine\ORM\Configuration
   */
  private function getEntityConfig() {
    // Create a simple "default" Doctrine ORM configuration for Attributes
    if (@!self::$entityConfig[$this->key_database]) {
      self::$entityConfig[$this->key_database] = ORMSetup::createAttributeMetadataConfiguration(paths: [
        __DIR__ . '/src/Entity'
      ], isDevMode: true);
    }
    return self::$entityConfig[$this->key_database];
  }
}
