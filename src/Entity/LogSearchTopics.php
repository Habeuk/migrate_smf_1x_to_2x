<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'log_search_topics')]
class LogSearchTopics {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  private $ID_SEARCH;
  /**
   * memberName
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  private string $ID_TOPIC;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'log_search_topics';
  }
  
  protected function getColumnId() {
    return 'ID_SEARCH';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_SEARCH',
      'smf_2' => 'id_search'
    ];
  }
  
  protected function buildRow(LogSearchTopics $row) {
    return [
      'id_search' => $row->ID_SEARCH,
      'id_topic' => $row->ID_TOPIC
    ];
  }
  
  /**
   * Recupere tous les produits.
   *
   * @return array
   */
  public function getDatas($page, $limit) {
    $EntityManager = DbConnection::EntityManager();
    $QB = $EntityManager->createQueryBuilder();
    $QB->select('m')->from(self::class, "m");
    $QB->setFirstResult($page * $limit);
    $QB->setMaxResults($limit);
    $QB->addOrderBy('m.ID_SEARCH', 'ASC');
    $QB->addOrderBy('m.ID_TOPIC', 'ASC');
    $query = $QB->getQuery();
    return $query->getResult();
    // paginator not work with multiple key.
    // $paginator = new Paginator($query, fetchJoinCollection: true);
    // return $paginator;
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
    $rows = $this->getDatas($page, $limit);
    $nbre = count($rows);
    $this->results['limit'] = $limit;
    $this->results['current_page'] = $page . "/" . (ceil($nbre / $limit));
    $this->results['total'] = $nbre;
    foreach ($rows as $Membergroups) {
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
    $cQB->from($table, 'dd')->where("$id_column = :id and id_topic = :id_topic ")->setParameter('id', $id_value)->setParameter("id_topic", $values["id_topic"]);
    $query = $cQB->executeQuery();
    if ($query->fetchAssociative()) {
      $cQB->update($table);
      $cQB->setUpdateValues($values);
      $cQB->where("$id_column = :$id_column and id_topic = :id_topic ");
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
}