<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'boards')]
class Boards {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_BOARD;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_CAT;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $childLevel;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_PARENT;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $boardOrder;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_LAST_MSG;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MSG_UPDATED;
  /**
   * pas present dans la nouvelle version.
   */
  #[ORM\Column(type: 'integer')]
  private string $lastUpdated;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $memberGroups;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $name;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $description;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $numTopics;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $numPosts;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $countPosts;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_THEME;
  /**
   * pas disponible dans la version 2x
   */
  #[ORM\Column(type: 'integer')]
  private string $permission_mode;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $override_theme;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'boards';
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
  
  protected function buildRow(Boards $row) {
    return [
      'id_board' => $row->ID_BOARD,
      'id_cat' => $row->ID_CAT,
      'child_level' => $row->childLevel,
      'id_parent' => $row->ID_PARENT,
      'board_order' => $row->boardOrder,
      'id_last_msg' => $row->ID_LAST_MSG,
      'id_msg_updated' => $row->ID_MSG_UPDATED,
      'member_groups' => $row->memberGroups,
      'id_profile' => 1,
      'name' => $row->name,
      'description' => $row->description,
      'num_topics' => $row->numTopics,
      'num_posts' => $row->numPosts,
      'count_posts' => $row->countPosts,
      'id_theme' => $row->ID_THEME,
      'override_theme' => $row->override_theme,
      'unapproved_posts' => 0,
      'redirect' => '',
      'deny_member_groups' => ''
    ];
  }
}