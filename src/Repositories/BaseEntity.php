<?php

namespace Habeuk\MigrateSmf1xTo2x\Repositories;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 *
 * @author stephane
 *        
 */
trait BaseEntity {
  protected $results = [
    'add' => 0,
    'update' => 0,
    'total' => 0
  ];
  
  /**
   * Recupere tous les produits.
   *
   * @param int $page
   * @param int $limit
   * @return \Doctrine\ORM\Tools\Pagination\Paginator
   */
  public function getDatas($page, $limit) {
    $EntityManager = DbConnection::EntityManager();
    $QB = $EntityManager->createQueryBuilder();
    $QB->select('m')->from(self::class, "m");
    $QB->setFirstResult($page * $limit);
    $QB->setMaxResults($limit);
    $QB->orderBy('m.' . $this->getColumnId(), 'ASC');
    $query = $QB->getQuery();
    try {
      $query->getResult();
    }
    catch (\Exception $e) {
      dd($e->getMessage());
    }
    $paginator = new Paginator($query, fetchJoinCollection: true);
    return $paginator;
  }
  
  /**
   * Recupere les données de l'ancienne base de données pour la nouvelle.
   */
  public function saveResultInVersion2x($page = 0, $limit = 100) {
    /**
     *
     * @var \Habeuk\MigrateSmf1xTo2x\Configs\QueryBuilderHelper $cQB
     */
    $cQB = DbConnection::connectionQueryBuilder('smf_v2');
    $table = $this->getTable();
    $colmunIdInfo = $this->getColumnIdInfo();
    /**
     *
     * @var \Doctrine\ORM\Tools\Pagination\Paginator $paginator
     */
    $paginator = $this->getDatas($page, $limit);
    $nbre = $paginator->count();
    $this->results['limit'] = $limit;
    $this->results['current_page'] = $page . "/" . (ceil($nbre / $limit));
    $this->results['total'] = $nbre;
    foreach ($paginator as $Membergroups) {
      $row = $this->buildRow($Membergroups);
      $this->insertOrUpdate($colmunIdInfo['smf_2'], $Membergroups->{$colmunIdInfo['smf_1']}, $table, $row, $cQB);
    }
  }
  
  /**
   *
   * @param string $id_column
   * @param string $id_value
   * @param string $table
   * @param array $values
   * @param \Habeuk\MigrateSmf1xTo2x\Configs\QueryBuilderHelper $cQB
   */
  protected function insertOrUpdate($id_column, $id_value, string $table, array $values, \Habeuk\MigrateSmf1xTo2x\Configs\QueryBuilderHelper $cQB) {
    $cQB->select($id_column);
    $cQB->from($table, 'dd')->where("$id_column = :id")->setParameter('id', $id_value);
    $query = $cQB->executeQuery();
    if ($query->fetchAssociative()) {
      $cQB->update($table);
      $cQB->setUpdateValues($values);
      $cQB->where("$id_column = :$id_column");
      $cQB->executeQuery();
      $this->results['update']++;
    }
    else {
      $cQB->insert($table);
      $cQB->setInsertValues($values);
      $cQB->executeQuery();
      $this->results['add']++;
    }
  }
  
  public function getresults() {
    return $this->results;
  }
}