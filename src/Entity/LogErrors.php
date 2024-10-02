<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'log_errors')]
class LogErrors {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_ERROR;
  
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
  #[ORM\Column(type: 'string')]
  private string $ip;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $url;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $message;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $session;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'log_errors';
  }
  
  protected function getColumnId() {
    return 'ID_ERROR';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_ERROR',
      'smf_2' => 'id_error'
    ];
  }
  
  protected function buildRow(LogErrors $row) {
    return [
      'id_error' => $row->ID_ERROR,
      'log_time' => $row->logTime,
      'id_member' => $row->ID_MEMBER,
      'ip' => $row->ip,
      'url' => $row->url,
      'message' => $row->message,
      'session' => $row->session,
      'error_type' => 'general',
      'file' => '',
      'line' => 0,
      'backtrace' => '[]'
    ];
  }
}