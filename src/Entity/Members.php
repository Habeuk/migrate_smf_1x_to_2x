<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'members')]
class Members {
  use BaseEntity;
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
  #[ORM\Column(type: 'string')]
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
   *
   * @return string
   */
  protected function getTable() {
    return 'members';
  }
  
  protected function getColumnId() {
    return 'ID_MEMBER';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_MEMBER',
      'smf_2' => 'id_member'
    ];
  }
  
  protected function buildRow(Members $row) {
    $mergeDatas = [
      'id_member' => $row->ID_MEMBER,
      'member_name' => $row->memberName,
      'date_registered' => $row->dateRegistered,
      'posts' => $row->posts,
      'id_group' => $row->ID_GROUP,
      'lngfile' => $row->lngfile,
      'last_login' => $row->lastLogin,
      'real_name' => $row->realName,
      'instant_messages' => $row->instantMessages,
      'unread_messages' => $row->unreadMessages,
      'new_pm' => 0,
      'alerts' => 0,
      'buddy_list' => $row->buddy_list,
      'pm_prefs' => 0,
      'mod_prefs' => '',
      'passwd' => $row->passwd,
      'email_address' => $row->emailAddress,
      'personal_text' => $row->personalText,
      'birthdate' => $row->birthdate,
      'website_title' => $row->websiteTitle,
      'website_url' => $row->websiteUrl,
      'show_online' => $row->showOnline,
      'time_format' => $row->timeFormat,
      'signature' => $row->signature,
      'time_offset' => $row->timeOffset,
      'avatar' => $row->avatar,
      'usertitle' => $row->usertitle,
      'member_ip' => $row->memberIP,
      'member_ip2' => $row->memberIP2,
      'secret_question' => $row->secretQuestion,
      'secret_answer' => $row->secretAnswer,
      'id_theme' => $row->ID_THEME,
      'is_activated' => $row->is_activated,
      'validation_code' => $row->validation_code,
      'id_msg_last_visit' => $row->ID_MSG_LAST_VISIT,
      'additional_groups' => $row->additionalGroups,
      'smiley_set' => $row->smileySet,
      'id_post_group' => $row->ID_POST_GROUP,
      'total_time_logged_in' => $row->totalTimeLoggedIn,
      'password_salt' => $row->passwordSalt,
      'ignore_boards' => '',
      'warning' => 0,
      'passwd_flood' => '',
      'pm_receive_from' => 1,
      'timezone' => '',
      'tfa_secret' => '',
      'tfa_backup' => ''
    ];
    return $mergeDatas;
  }
}