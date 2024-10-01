<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'message_icons')]
class MessageIcons {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_ICON;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $title;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $filename;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_BOARD;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $iconOrder;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'message_icons';
  }
  
  protected function getColumnId() {
    return 'ID_ICON';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_ICON',
      'smf_2' => 'id_icon'
    ];
  }
  
  protected function buildRow(MessageIcons $row) {
    return [
      'id_icon' => $row->ID_ICON,
      'title' => $row->title,
      'filename' => $row->filename,
      'id_board' => $row->ID_BOARD,
      'icon_order' => $row->iconOrder
    ];
  }
}