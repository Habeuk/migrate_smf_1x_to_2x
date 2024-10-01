<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'personal_messages')]
class PersonalMessages {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_PM;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MEMBER_FROM;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $deletedBySender;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $fromName;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $msgtime;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $subject;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $body;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'personal_messages';
  }
  
  protected function getColumnId() {
    return 'ID_PM';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_PM',
      'smf_2' => 'id_pm'
    ];
  }
  
  protected function buildRow(PersonalMessages $row) {
    return [
      'id_pm' => $row->ID_PM,
      'id_pm_head' => 0,
      'id_member_from' => $row->ID_MEMBER_FROM,
      'deleted_by_sender' => $row->deletedBySender,
      'from_name' => $row->fromName,
      'msgtime' => $row->msgtime,
      'subject' => $row->subject,
      'body' => $row->body
    ];
  }
}