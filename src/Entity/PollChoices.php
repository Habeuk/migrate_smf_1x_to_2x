<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'poll_choices')]
class PollChoices {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  private $ID_POLL;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_CHOICE;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $label;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $votes;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'poll_choices';
  }
  
  protected function getColumnId() {
    return 'ID_POLL';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_POLL',
      'smf_2' => 'id_poll'
    ];
  }
  
  protected function buildRow(PollChoices $row) {
    return [
      'id_poll' => $row->ID_POLL,
      'id_choice' => $row->ID_CHOICE,
      'label' => $row->label,
      'votes' => $row->votes
    ];
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
    $cQB->select($id_column, 'id_choice');
    $cQB->from($table, 'dd')->where("$id_column = :id and id_choice = :id_choice ")->setParameter('id', $id_value)->setParameter("id_choice", $values["id_choice"]);
    $query = $cQB->executeQuery();
    if ($query->fetchAssociative()) {
      $cQB->update($table);
      $cQB->setUpdateValues($values);
      $cQB->where("$id_column = :$id_column and id_choice = :id_choice ");
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