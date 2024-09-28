<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnetion;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnetion2;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'membergroups')]
class Membergroups {
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
   * Recupere tous les produits.
   *
   * @return array
   */
  public function getAllMembersGroups() {
    $EntityManager = DbConnetion::EntityManager();
    $QB = $EntityManager->createQueryBuilder();
    $QB->select('m')->from(self::class, "m");
    $QB->setFirstResult(0);
    $QB->setMaxResults(100);
    $query = $QB->getQuery();
    return $query->getResult();
  }
  
  /**
   * Recupere les données de l'ancinne base de données pour la nouvelle.
   */
  public function saveResultInVersion2x() {
    $EntityManager = DbConnetion2::EntityManager();
    foreach ($this->getAllMembersGroups() as $Membergroups) {
      $row = [
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
      
      dd($row);
    }
  }
}