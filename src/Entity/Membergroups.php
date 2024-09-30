<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'membergroups')]
class Membergroups {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_GROUP;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'string', length: 80)]
  private string $groupName;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $onlineColor;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $minPosts;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $maxMessages;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $stars;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'membergroups';
  }
  
  protected function getColumnId() {
    return 'ID_GROUP';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_GROUP',
      'smf_2' => 'id_group'
    ];
  }
  
  protected function buildRow(Membergroups $Membergroups) {
    return [
      'id_group' => $Membergroups->ID_GROUP,
      'group_name' => $Membergroups->groupName,
      'description' => '',
      'online_color' => $Membergroups->onlineColor,
      'min_posts' => $Membergroups->minPosts,
      'max_messages' => $Membergroups->maxMessages,
      'icons' => $Membergroups->stars,
      'group_type' => 0,
      'hidden' => 0,
      'id_parent' => 0,
      'tfa_required' => 0
    ];
  }
}