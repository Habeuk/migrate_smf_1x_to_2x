<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'topics')]
class Topics {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_TOPIC;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $isSticky;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_BOARD;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_FIRST_MSG;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_LAST_MSG;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MEMBER_STARTED;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MEMBER_UPDATED;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_POLL;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $numReplies;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $numViews;
  /**
   */
  #[ORM\Column(type: 'integer')]
  private string $locked;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'topics';
  }
  
  protected function getColumnId() {
    return 'ID_TOPIC';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_TOPIC',
      'smf_2' => 'id_topic'
    ];
  }
  
  protected function buildRow(Topics $row) {
    return [
      'id_topic' => $row->ID_TOPIC,
      'is_sticky' => $row->isSticky,
      'id_board' => $row->ID_BOARD,
      'id_first_msg' => $row->ID_FIRST_MSG,
      'id_last_msg' => $row->ID_LAST_MSG,
      'id_member_started' => $row->ID_MEMBER_STARTED,
      'id_member_updated' => $row->ID_MEMBER_UPDATED,
      'id_poll' => $row->ID_POLL,
      'num_replies' => $row->numReplies,
      'num_views' => $row->numViews,
      'locked' => $row->locked,
      'redirect_expires' => 0,
      'id_redirect_topic' => 0,
      'unapproved_posts' => 0,
      'approved' => 1
    ];
  }
}