<?php

namespace Habeuk\MigrateSmf1xTo2x\Repository;

use Habeuk\MigrateSmf1xTo2x\Entity\Members;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MembersRepository extends ServiceEntityRepository {
  
  public function __construct(ManagerRegistry $registry) {
    parent::__construct($registry, Members::class);
  }
  
  public function findAllUsers() {
    return $this->findAll();
  }
}