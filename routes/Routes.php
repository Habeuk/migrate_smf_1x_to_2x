<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
/**
 *
 * @see https://code.tutsplus.com/set-up-routing-in-php-applications-using-the-symfony-routing-component--cms-31231t
 */
$routes = new RouteCollection();

$routes->add('home', new Route('/', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\HomeController::index'
]));
$routes->add('members', new Route('/members', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\HomeController::members'
]));
$routes->add('import_groupsmembers', new Route('/import-groups-members', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportGroupsMembers'
]));
$routes->add('import_members', new Route('/import-members', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportMembers'
]));
$routes->add('import_members', new Route('/import-attachments', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportAttachments'
]));
$routes->add('import_members', new Route('/import-categories', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportCategories'
]));
$routes->add('import_members', new Route('/import-polls', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPolls'
]));
$routes->add('import_members', new Route('/import-boards', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPoards'
]));
$routes->add('import_members', new Route('/import-topics', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportTopics'
]));
return $routes;