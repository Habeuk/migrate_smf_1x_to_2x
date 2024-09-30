<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'polls')]
class Polls {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_POLL;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $question;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $votingLocked;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $maxVotes;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $expireTime;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $hideResults;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $changeVote;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MEMBER;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $posterName;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'polls';
  }
  
  protected function getColumnId() {
    return 'ID_POLL';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_POLL',
      'smf_2' => 'id_poll'
    ];
  }
  
  protected function buildRow(Polls $row) {
    return [
      'id_poll' => $row->ID_POLL,
      'question' => $row->question,
      'voting_locked' => $row->votingLocked,
      'max_votes' => $row->maxVotes,
      'expire_time' => $row->expireTime,
      'hide_results' => $row->hideResults,
      'change_vote' => $row->changeVote,
      'id_member' => $row->ID_MEMBER,
      'guest_vote' => 0,
      'num_guest_voters' => 0,
      'reset_poll' => 0,
      'id_member' => $row->ID_MEMBER,
      'poster_name' => $row->posterName
    ];
  }
}