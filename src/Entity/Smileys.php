<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'smileys')]
class Smileys {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_SMILEY;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $code;
  /**
   * Ne dispose de version en 2x
   */
  #[ORM\Column(type: 'string')]
  private string $filename;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $description;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private $smileyRow;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $smileyOrder;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $hidden;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'smileys';
  }
  
  protected function getColumnId() {
    return 'ID_SMILEY';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_SMILEY',
      'smf_2' => 'id_smiley'
    ];
  }
  
  protected function buildRow(Smileys $row) {
    return [
      'id_smiley' => $row->ID_SMILEY,
      'code' => $row->code,
      'description' => $row->description,
      'smiley_row' => $row->smileyRow,
      'smiley_order' => $row->smileyOrder,
      'hidden' => $row->hidden
    ];
  }
}