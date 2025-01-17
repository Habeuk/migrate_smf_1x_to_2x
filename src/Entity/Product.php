<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entite permettant de gerer les produits.
 * ( ce ci est pour les tests uniquements).
 */
#[ORM\Entity]
#[ORM\Table(name: 'products')]
class Product {
  
  /**
   * column id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private int|null $id = null;
  
  /**
   * coloumn
   */
  #[ORM\Column(type: 'string')]
  private string $name;
  
  /**
   *
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
  }
  
  /**
   * Recupere tous les produits.
   *
   * @return array
   */
  public function getAllProducts() {
    $productRepository = DbConnection::EntityManager()->getRepository(self::class);
    return $productRepository->findAll();
  }
}