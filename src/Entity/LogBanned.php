<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'log_banned')]
class LogBanned {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_BAN_LOG;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MEMBER;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $ip;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $email;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $logTime;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'log_banned';
  }
  
  protected function getColumnId() {
    return 'ID_BAN_LOG';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_BAN_LOG',
      'smf_2' => 'id_ban_log'
    ];
  }
  
  protected function buildRow(LogBanned $row) {
    return [
      'id_ban_log' => $row->ID_BAN_LOG,
      'id_member' => $row->ID_MEMBER,
      'ip' => $row->ip,
      'email' => $row->email,
      'log_time' => $row->logTime
    ];
  }
}