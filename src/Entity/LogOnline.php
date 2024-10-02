<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'log_online')]
class LogOnline {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'string')]
  private $session;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $logTime;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MEMBER;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ip;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $url;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'log_online';
  }
  
  protected function getColumnId() {
    return 'session';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'session',
      'smf_2' => 'session'
    ];
  }
  
  protected function buildRow(LogOnline $row) {
    return [
      'session' => $row->session,
      'log_time' => $row->logTime,
      'id_member' => $row->ID_MEMBER,
      'id_spider' => 0,
      'ip' => $row->ip,
      'url' => $row->url
    ];
  }
}