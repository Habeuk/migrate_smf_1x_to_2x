<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnetion;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'members')]
class Members {
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_MEMBER;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'string', length: 80)]
  private string $memberName;
  
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $dateRegistered;
  
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $posts;
  
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $ID_GROUP;
  
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $lngfile;
  
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $lastLogin;
  
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $realName;
  
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $instantMessages;
  
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $unreadMessages;
  
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $pm_ignore_list;
  
  /**
   * id
   */
  #[ORM\Column(type: 'string')]
  private $passwd;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $emailAddress;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $personalText;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $gender;
  /**
   * id
   */
  #[ORM\Column(type: 'datetime')]
  private $birthdate;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $websiteTitle;
  
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $websiteUrl;
  
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $location;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $ICQ;
  /**
   * id
   */
  #[ORM\Column(type: 'string')]
  private $AIM;
  /**
   * id
   */
  #[ORM\Column(type: 'string')]
  private $YIM;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $MSN;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $hideEmail;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $showOnline;
  /**
   * id
   */
  #[ORM\Column(type: 'string')]
  private $timeFormat;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $signature;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $timeOffset;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $avatar;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $pm_email_notify;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $karmaBad;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $karmaGood;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $usertitle;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $notifyAnnouncements;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $notifyOnce;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $memberIP;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $secretQuestion;
  /**
   * id
   */
  #[ORM\Column(type: 'string')]
  private $secretAnswer;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $ID_THEME;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $is_activated;
  /**
   * id
   */
  #[ORM\Column(type: 'string')]
  private $validation_code;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $ID_MSG_LAST_VISIT;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $additionalGroups;
  /**
   * id
   */
  #[ORM\Column(type: 'string')]
  private $smileySet;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $ID_POST_GROUP;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $totalTimeLoggedIn;
  /**
   * id
   */
  #[ORM\Column(type: 'string')]
  private $passwordSalt;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $messageLabels;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $buddy_list;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $notifySendBody;
  /**
   * id
   */
  #[ORM\Column(type: 'integer')]
  private $notifyTypes;
  /**
   * id
   */
  #[ORM\Column(type: 'text')]
  private $memberIP2;
  
  /**
   * Recupere tous les produits.
   *
   * @return array
   */
  public function getAllMembers() {
    $EntityManager = DbConnetion::EntityManager();
    $QB = $EntityManager->createQueryBuilder();
    $QB->select('m')->from(self::class, "m");
    $QB->setFirstResult(0);
    $QB->setMaxResults(30);
    $query = $QB->getQuery();
    $membres = $query->getResult();
    dump($membres);
    // $productRepository =
    // DbConnetion::EntityManager()->getRepository(self::class);
    // return $productRepository->findAll();
  }
}