<?php

namespace Habeuk\MigrateSmf1xTo2x\Controller;

use Symfony\Component\HttpFoundation\Response;
use Habeuk\MigrateSmf1xTo2x\Entity\Membergroups;

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
    return new Response("Importe les groupes de membles et les données requises");
  }
}