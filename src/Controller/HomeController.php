<?php

namespace Habeuk\MigrateSmf1xTo2x\Controller;

use Symfony\Component\HttpFoundation\Response;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnetion;

/**
 *
 * @author stephane
 *        
 */
class HomeController {
  
  public function index() {
    return new Response('Bonjour, Symfony!');
  }
  
  public function members() {
    $MembresRepository = DbConnetion::EntityManager()->getRepository(\Habeuk\MigrateSmf1xTo2x\Entity\Members::class);
    $Membres = $MembresRepository->findAll();
    return new Response('Liste des membres');
  }
}