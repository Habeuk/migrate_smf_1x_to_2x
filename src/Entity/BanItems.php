<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'ban_items')]
class BanItems {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_BAN;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_BAN_GROUP;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private $ip_low1;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private $ip_high1;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private $hostname;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private $email_address;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private $ID_MEMBER;
  /**
   * pas present dans la nouvelle version.
   */
  #[ORM\Column(type: 'integer')]
  private $hits;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'ban_items';
  }
  
  protected function getColumnId() {
    return 'ID_BAN';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_BAN',
      'smf_2' => 'id_ban'
    ];
  }
  
  protected function buildRow(BanItems $row) {
    return [
      'id_ban' => $row->ID_BAN,
      'id_ban_group' => $row->ID_BAN_GROUP,
      'ip_low' => $row->ip_low1,
      'ip_high' => $row->ip_high1,
      'hostname' => $row->hostname,
      'email_address' => $row->email_address,
      'id_member' => $row->ID_MEMBER,
      'hits' => $row->hits
    ];
  }
}