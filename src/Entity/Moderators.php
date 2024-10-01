<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'moderators')]
class Moderators {
  use BaseEntity;
  
  /**
   * memberName
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  private string $ID_BOARD;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MEMBER;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'moderators';
  }
  
  protected function getColumnId() {
    return 'ID_BOARD';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_BOARD',
      'smf_2' => 'id_board'
    ];
  }
  
  protected function buildRow(Moderators $row) {
    return [
      'id_board' => $row->ID_BOARD,
      'id_member' => $row->ID_MEMBER
    ];
  }
}