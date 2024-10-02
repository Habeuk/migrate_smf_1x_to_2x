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

/**
 *
 * @author stephane
 *        
 */
class ImportDatasController {
  
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
}