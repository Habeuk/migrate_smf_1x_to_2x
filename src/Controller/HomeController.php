<?php

namespace Habeuk\MigrateSmf1xTo2x\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 *
 * @author stephane
 *        
 */
class HomeController {
  
  public function index() {
    return new Response('Bonjour, Symfony!');
  }
}