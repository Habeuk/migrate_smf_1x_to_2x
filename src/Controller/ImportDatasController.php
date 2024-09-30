<?php

namespace Habeuk\MigrateSmf1xTo2x\Controller;

use Symfony\Component\HttpFoundation\Response;
use Habeuk\MigrateSmf1xTo2x\Entity\Membergroups;
use Habeuk\MigrateSmf1xTo2x\Entity\Members;
use Habeuk\MigrateSmf1xTo2x\Entity\Attachments;
use Habeuk\MigrateSmf1xTo2x\Entity\Categories;
use Habeuk\MigrateSmf1xTo2x\Entity\Polls;

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