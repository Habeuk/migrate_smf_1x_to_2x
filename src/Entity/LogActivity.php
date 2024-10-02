<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'log_activity')]
class LogActivity {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'string')]
  private $date;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $hits;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $topics;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $posts;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $registers;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $mostOn;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'log_activity';
  }
  
  protected function getColumnId() {
    return 'date';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'date',
      'smf_2' => 'date'
    ];
  }
  
  protected function buildRow(LogActivity $row) {
    return [
      'date' => $row->date,
      'hits' => $row->hits,
      'topics' => $row->topics,
      'posts' => $row->posts,
      'registers' => $row->registers,
      'most_on' => $row->mostOn
    ];
  }
}