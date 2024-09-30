<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'categories')]
class Categories {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_CAT;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $catOrder;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $name;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $canCollapse;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'categories';
  }
  
  protected function getColumnId() {
    return 'ID_CAT';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_CAT',
      'smf_2' => 'id_cat'
    ];
  }
  
  protected function buildRow(Categories $row) {
    return [
      'id_cat' => $row->ID_CAT,
      'cat_order' => $row->catOrder,
      'name' => $row->name,
      'description' => '',
      'can_collapse' => $row->canCollapse
    ];
  }
}