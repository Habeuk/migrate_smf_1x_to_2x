<?php

namespace Habeuk\MigrateSmf1xTo2x\Controller;

use Symfony\Component\HttpFoundation\Response;
use Habeuk\MigrateSmf1xTo2x\Entity\Product;

/**
 *
 * @author stephane
 *        
 */
class HomeController {
  
  public function index() {
    $Product = new Product();
    $Product->getAllProducts();
    return new Response('Bonjour, Symfony!');
  }
  
  public function members() {
    return new Response('Liste des membres');
  }
}