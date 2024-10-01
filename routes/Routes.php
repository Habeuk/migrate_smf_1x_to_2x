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
$routes->add('import_attachments', new Route('/import-attachments', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportAttachments'
]));
$routes->add('import_categories', new Route('/import-categories', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportCategories'
]));
$routes->add('import_polls', new Route('/import-polls', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPolls'
]));
$routes->add('import_boards', new Route('/import-boards', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPoards'
]));
$routes->add('import_topics', new Route('/import-topics', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportTopics'
]));
$routes->add('import_messages',
  new Route('/import-messages/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportMessages'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_messages_icons', new Route('/import-messages-icons', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportMessagesIcons'
]));
$routes->add('import_personal_messages', new Route('/import-personal-messages', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPersonalMessages'
]));
$routes->add('import_Moderators', new Route('/import-moderators', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportModerators'
]));
$routes->add('import_Permissions', new Route('/import-permissions', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPermissions'
]));
$routes->add('import_pm_recipients', new Route('/import-pm_recipients', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPmRecipients'
]));
$routes->add('import_poll_choices', new Route('/import-poll_choices', [
  '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPollChoices'
]));
return $routes;