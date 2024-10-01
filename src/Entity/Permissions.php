<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'permissions')]
class Permissions {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_GROUP;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $permission;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $addDeny;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'permissions';
  }
  
  protected function getColumnId() {
    return 'ID_GROUP';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_GROUP',
      'smf_2' => 'id_group'
    ];
  }
  
  protected function buildRow(Permissions $row) {
    return [
      'id_group' => $row->ID_GROUP,
      'permission' => $row->permission,
      'add_deny' => $row->addDeny
    ];
  }
  
  /**
   * Recupere tous les produits.
   *
   * @return array
   */
  public function getDatas() {
    $EntityManager = DbConnection::EntityManager();
    $QB = $EntityManager->createQueryBuilder();
    $QB->select('m')->from(self::class, "m");
    $query = $QB->getQuery();
    return $query->getResult();
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
    $cQB->select($id_column, 'permission');
    $cQB->from($table, 'dd')->where("$id_column = :id and permission = :permission ")->setParameter('id', $id_value)->setParameter("permission", $values["permission"]);
    $query = $cQB->executeQuery();
    if ($query->fetchAssociative()) {
      $cQB->update($table);
      $cQB->setUpdateValues($values);
      $cQB->where("$id_column = :$id_column and permission = :permission ");
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