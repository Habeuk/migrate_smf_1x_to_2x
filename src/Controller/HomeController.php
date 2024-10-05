<?php

namespace Habeuk\MigrateSmf1xTo2x\Controller;

use Symfony\Component\HttpFoundation\Response;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;

/**
 *
 * @author stephane
 *        
 */
class HomeController {
  
  public function index() {
    return new Response('Bonjour, Symfony!');
  }
  
  /**
   * --
   *
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function members() {
    $members = new \Habeuk\MigrateSmf1xTo2x\Entity\Members();
    $members->getAllMembers();
    return new Response('Liste des membres');
  }
}