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
/**
 * Import datas.
 */
$routes->add('import_groupsmembers',
  new Route('/import-groups-members/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportGroupsMembers'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_members',
  new Route('/import-members/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportMembers'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_attachments',
  new Route('/import-attachments/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportAttachments'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_categories',
  new Route('/import-categories/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportCategories'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_polls',
  new Route('/import-polls/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPolls'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_boards',
  new Route('/import-boards/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPoards'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_topics',
  new Route('/import-topics/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportTopics'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_messages',
  new Route('/import-messages/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportMessages'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_messages_icons',
  new Route('/import-messages-icons/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportMessagesIcons'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_personal_messages',
  new Route('/import-personal-messages/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPersonalMessages'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_Moderators',
  new Route('/import-moderators/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportModerators'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_Permissions',
  new Route('/import-permissions/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPermissions'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_pm_recipients',
  new Route('/import-pm_recipients/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPmRecipients'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import_poll_choices',
  new Route('/import-poll_choices/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportPollChoices'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
return $routes;