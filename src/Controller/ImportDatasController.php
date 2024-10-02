<?php

namespace Habeuk\MigrateSmf1xTo2x\Controller;

use Symfony\Component\HttpFoundation\Response;
use Habeuk\MigrateSmf1xTo2x\Entity\Membergroups;
use Habeuk\MigrateSmf1xTo2x\Entity\Members;
use Habeuk\MigrateSmf1xTo2x\Entity\Attachments;
use Habeuk\MigrateSmf1xTo2x\Entity\Categories;
use Habeuk\MigrateSmf1xTo2x\Entity\Polls;
use Habeuk\MigrateSmf1xTo2x\Entity\Boards;
use Habeuk\MigrateSmf1xTo2x\Entity\Topics;
use Habeuk\MigrateSmf1xTo2x\Entity\Messages;
use Habeuk\MigrateSmf1xTo2x\Entity\MessageIcons;
use Habeuk\MigrateSmf1xTo2x\Entity\PersonalMessages;
use Habeuk\MigrateSmf1xTo2x\Entity\Moderators;
use Habeuk\MigrateSmf1xTo2x\Entity\Permissions;
use Habeuk\MigrateSmf1xTo2x\Entity\PmRecipients;
use Habeuk\MigrateSmf1xTo2x\Entity\PollChoices;
use Habeuk\MigrateSmf1xTo2x\Entity\BoardPermissions;
use Habeuk\MigrateSmf1xTo2x\Entity\LogActivity;
use Habeuk\MigrateSmf1xTo2x\Entity\LogBanned;
use Habeuk\MigrateSmf1xTo2x\Entity\LogBoards;
use Habeuk\MigrateSmf1xTo2x\Entity\LogErrors;
use Habeuk\MigrateSmf1xTo2x\Entity\LogMarkRead;
use Habeuk\MigrateSmf1xTo2x\Entity\LogNotify;
use Habeuk\MigrateSmf1xTo2x\Entity\LogOnline;
use Habeuk\MigrateSmf1xTo2x\Entity\LogPolls;
use Habeuk\MigrateSmf1xTo2x\Entity\LogSearchMessages;
use Habeuk\MigrateSmf1xTo2x\Entity\LogSearchResults;
use Habeuk\MigrateSmf1xTo2x\Entity\LogSearchSubjects;
use Habeuk\MigrateSmf1xTo2x\Entity\LogSearchTopics;
use Habeuk\MigrateSmf1xTo2x\Entity\Smileys;

/**
 *
 * @author stephane
 *        
 */
class ImportDatasController {
  
  public function ImportSmileys($page, $limit) {
    $entity = new Smileys();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogSearchTopics ");
  }
  
  public function ImportLogSearchTopics($page, $limit) {
    $entity = new LogSearchTopics();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogSearchTopics ");
  }
  
  public function ImportLogSearchSubjects($page, $limit) {
    $entity = new LogSearchSubjects();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogSearchSubjects ");
  }
  
  public function ImportLogSearchResults($page, $limit) {
    $entity = new LogSearchResults();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogSearchResults ");
  }
  
  public function ImportLogSearchMessages($page, $limit) {
    $entity = new LogSearchMessages();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogSearchMessages ");
  }
  
  public function ImportLogPolls($page, $limit) {
    $entity = new LogPolls();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogPolls ");
  }
  
  public function ImportLogOnline($page, $limit) {
    $entity = new LogOnline();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogOnline ");
  }
  
  public function ImportLogNotify($page, $limit) {
    $entity = new LogNotify();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogNotify ");
  }
  
  public function ImportLogMarkRead($page, $limit) {
    $entity = new LogMarkRead();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogMarkRead ");
  }
  
  public function ImportLogErrors($page, $limit) {
    $entity = new LogErrors();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogErrors ");
  }
  
  public function ImportLogBoards($page, $limit) {
    $entity = new LogBoards();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogBoards ");
  }
  
  public function ImportLogBanned($page, $limit) {
    $entity = new LogBanned();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogBanned ");
  }
  
  public function ImportLogActivity($page, $limit) {
    $entity = new LogActivity();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des LogActivity ");
  }
  
  /**
   * Importe les groupes de membles et les données requises.
   */
  public function ImportGroupsMembers($page, $limit) {
    $Membergroups = new Membergroups();
    $Membergroups->saveResultInVersion2x($page, $limit);
    dump($Membergroups->getresults());
    return new Response("Importe les groupes de membles et les données requises");
  }
  
  public function ImportPolls($page, $limit) {
    $Polls = new Polls();
    $Polls->saveResultInVersion2x($page, $limit);
    dump($Polls->getresults());
    return new Response("Importe des Polls ");
  }
  
  public function ImportPollChoices($page, $limit) {
    $entity = new PollChoices();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des PollChoices ");
  }
  
  public function ImportPmRecipients($page, $limit) {
    $entity = new PmRecipients();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des PmRecipients ");
  }
  
  public function ImportPermissions($page, $limit) {
    $entity = new Permissions();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des Permissions ");
  }
  
  public function ImportModerators($page, $limit) {
    $entity = new Moderators();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response("Importe des Moderators");
  }
  
  public function ImportPersonalMessages($page, $limit) {
    $entity = new PersonalMessages();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response("Importe des PersonalMessages");
  }
  
  public function ImportMessagesIcons() {
    $entity = new MessageIcons();
    $entity->saveResultInVersion2x();
    dump($entity->getresults());
    return new Response("Importe des MessageIcons");
  }
  
  public function ImportMessages($page, $limit) {
    $entity = new Messages();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response("Importe des Messages");
  }
  
  public function ImportTopics($page, $limit) {
    $entity = new Topics();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response("Importe des Topics ");
  }
  
  public function ImportPoards($page, $limit) {
    $Boards = new Boards();
    $Boards->saveResultInVersion2x($page, $limit);
    dump($Boards->getresults());
    return new Response("Importe des Boards ");
  }
  
  /**
   * --
   */
  public function ImportMembers($page, $limit) {
    $Members = new Members();
    $Members->saveResultInVersion2x($page, $limit);
    dump($Members->getresults());
    return new Response("Importe des utilisateurs");
  }
  
  public function ImportAttachments($page, $limit) {
    $Attachments = new Attachments();
    $Attachments->saveResultInVersion2x($page, $limit);
    dump($Attachments->getresults());
    return new Response("Importe des Attachments ");
  }
  
  public function ImportCategories($page, $limit) {
    $Categories = new Categories();
    $Categories->saveResultInVersion2x($page, $limit);
    dump($Categories->getresults());
    return new Response("Importe des Categories ");
  }
  
  public function ImportBoardPermissions($page, $limit) {
    $entity = new BoardPermissions();
    $entity->saveResultInVersion2x($page, $limit);
    dump($entity->getresults());
    return new Response(" Importe des BoardPermissions ");
  }
}