<?php

namespace Habeuk\MigrateSmf1xTo2x\Controller;

use Symfony\Component\HttpFoundation\Response;
use Habeuk\MigrateSmf1xTo2x\Entity\Membergroups;
use Habeuk\MigrateSmf1xTo2x\Entity\Members;

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
  
  /**
   * --
   */
  public function ImportMembers() {
    $Members = new Members();
    $Members->saveResultInVersion2x();
    dump($Members->getresults());
    return new Response("Importe des utilisateurs");
  }
}