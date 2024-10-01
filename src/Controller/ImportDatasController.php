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

/**
 *
 * @author stephane
 *        
 */
class ImportDatasController {
  
  /**
   * Importe les groupes de membles et les données requises.
   */
  public function ImportGroupsMembers() {
    $Membergroups = new Membergroups();
    $Membergroups->saveResultInVersion2x();
    dump($Membergroups->getresults());
    return new Response("Importe les groupes de membles et les données requises");
  }
  
  public function ImportPolls() {
    $Polls = new Polls();
    $Polls->saveResultInVersion2x();
    dump($Polls->getresults());
    return new Response("Importe des Polls ");
  }
  
  public function ImportPmRecipients() {
    $entity = new PmRecipients();
    $entity->saveResultInVersion2x();
    dump($entity->getresults());
    return new Response(" Importe des PmRecipients ");
  }
  
  public function ImportPermissions() {
    $entity = new Permissions();
    $entity->saveResultInVersion2x();
    dump($entity->getresults());
    return new Response(" Importe des Permissions ");
  }
  
  public function ImportModerators() {
    $entity = new Moderators();
    $entity->saveResultInVersion2x();
    dump($entity->getresults());
    return new Response("Importe des Moderators");
  }
  
  public function ImportPersonalMessages() {
    $entity = new PersonalMessages();
    $entity->saveResultInVersion2x();
    dump($entity->getresults());
    return new Response("Importe des PersonalMessages");
  }
  
  public function ImportMessagesIcons() {
    $entity = new MessageIcons();
    $entity->saveResultInVersion2x();
    dump($entity->getresults());
    return new Response("Importe des MessageIcons");
  }
  
  public function ImportMessages() {
    $entity = new Messages();
    $entity->saveResultInVersion2x();
    dump($entity->getresults());
    return new Response("Importe des Messages");
  }
  
  public function ImportTopics() {
    $entity = new Topics();
    $entity->saveResultInVersion2x();
    dump($entity->getresults());
    return new Response("Importe des Topics ");
  }
  
  public function ImportPoards() {
    $Boards = new Boards();
    $Boards->saveResultInVersion2x();
    dump($Boards->getresults());
    return new Response("Importe des Boards ");
  }
  
  /**
   * --
   */
  public function ImportMembers() {
    $Members = new Members();
    $Members->saveResultInVersion2x();
    dump($Members->getresults());
    return new Response("Importe des utilisateurs");
  }
  
  public function ImportAttachments() {
    $Attachments = new Attachments();
    $Attachments->saveResultInVersion2x();
    dump($Attachments->getresults());
    return new Response("Importe des Attachments ");
  }
  
  public function ImportCategories() {
    $Categories = new Categories();
    $Categories->saveResultInVersion2x();
    dump($Categories->getresults());
    return new Response("Importe des Categories ");
  }
}