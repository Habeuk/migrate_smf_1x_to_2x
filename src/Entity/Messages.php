<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'messages')]
class Messages {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_MSG;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_TOPIC;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_BOARD;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $posterTime;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MEMBER;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MSG_MODIFIED;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $subject;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $posterName;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $posterEmail;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $posterIP;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $smileysEnabled;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $modifiedTime;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $modifiedName;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $body;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $icon;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'messages';
  }
  
  protected function getColumnId() {
    return 'ID_MSG';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_MSG',
      'smf_2' => 'id_msg'
    ];
  }
  
  /**
   *
   * @param Messages $row
   * @return string[]|number[]|NULL[]
   */
  protected function buildRow(Messages $row) {
    return [
      'id_msg' => $row->ID_MSG,
      'id_topic' => $row->ID_TOPIC,
      'id_board' => $row->ID_BOARD,
      'poster_time' => $row->posterTime,
      'id_member' => $row->ID_MEMBER,
      'id_msg_modified' => $row->ID_MSG_MODIFIED,
      'subject' => $row->subject,
      'poster_name' => $row->posterName,
      'poster_email' => $row->posterEmail,
      'poster_ip' => $row->posterIP,
      'smileys_enabled' => $row->smileysEnabled,
      'modified_time' => $row->modifiedTime,
      'modified_name' => $row->modifiedName,
      'modified_reason' => '',
      'body' => $row->body,
      'icon' => $row->icon,
      'approved' => 1,
      "likes" => 0
    ];
  }
}