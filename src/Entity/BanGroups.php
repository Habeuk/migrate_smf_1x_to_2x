<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'ban_groups')]
class BanGroups {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_BAN_GROUP;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $name;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private $ban_time;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private $expire_time;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private $cannot_access;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private $cannot_register;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $cannot_post;
  /**
   * pas present dans la nouvelle version.
   */
  #[ORM\Column(type: 'integer')]
  private $cannot_login;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private $reason;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private $notes;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'ban_groups';
  }
  
  protected function getColumnId() {
    return 'ID_BAN_GROUP';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_BAN_GROUP',
      'smf_2' => 'id_ban_group'
    ];
  }
  
  protected function buildRow(BanGroups $row) {
    return [
      'id_ban_group' => $row->ID_BAN_GROUP,
      'name' => $row->name,
      'ban_time' => $row->ban_time,
      'expire_time' => $row->expire_time,
      'cannot_access' => $row->cannot_access,
      'cannot_register' => $row->cannot_register,
      'cannot_post' => $row->cannot_post,
      'cannot_login' => $row->cannot_login,
      'reason' => $row->reason,
      'notes' => $row->notes
    ];
  }
}