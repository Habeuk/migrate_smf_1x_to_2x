<?php

namespace Habeuk\MigrateSmf1xTo2x\Configs;

use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Query\QueryType;

class QueryBuilderHelper extends QueryBuilder {
  /**
   * Prefix des tables.
   *
   * @var string
   */
  protected $prefixTable = '';
  
  /**
   *
   * {@inheritdoc}
   * @see \Doctrine\DBAL\Query\QueryBuilder::insert()
   */
  public function insert(string $table): self {
    if ($this->prefixTable)
      $table = $this->prefixTable . $table;
    return parent::insert($table);
  }
  
  public function update(string $table): self {
    if ($this->prefixTable)
      $table = $this->prefixTable . $table;
    return parent::update($table);
  }
  
  public function from(string $table, ?string $alias = null): self {
    if ($this->prefixTable)
      $table = $this->prefixTable . $table;
    return parent::from($table);
  }
  
  public function setUpdateValues(array $values) {
    foreach ($values as $column => $value) {
      $this->set($column, ":$column");
      $this->setParameter("$column", $value);
    }
  }
  
  public function setInsertValues(array $values) {
    foreach ($values as $column => $value) {
      $this->setValue($column, ":$column");
      $this->setParameter("$column", $value);
    }
  }
  
  public function setValues2(array $values) {
    foreach ($values as $key => $value) {
      // $this->set($key, ":$key");
      $this->setParameter(":$key", $value);
    }
  }
  
  public function setPrefixTable(string $prefix) {
    $this->prefixTable = $prefix;
  }
}