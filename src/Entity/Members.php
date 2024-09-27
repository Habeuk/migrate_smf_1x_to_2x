<?php

// namespace Habeuk\MigrateSmf1xTo2x\Entity;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\Table(name: 'members')]
class Members {
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_MEMBER;
  #[ORM\Column(type: 'string', length: 80)]
  private string $memberName;
}