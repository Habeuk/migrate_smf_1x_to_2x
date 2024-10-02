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
$routes->add('import_board_permissions',
  new Route('/import-board_permissions/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportBoardPermissions'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_activity',
  new Route('/import-log_activity/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogActivity'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_banned',
  new Route('/import-log_banned/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogBanned'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_boards',
  new Route('/import-log_boards/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogBoards'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_errors',
  new Route('/import-log_errors/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogErrors'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_mark_read',
  new Route('/import-log_mark_read/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogMarkRead'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_notify',
  new Route('/import-log_notify/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogNotify'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_online',
  new Route('/import-log_online/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogOnline'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_polls',
  new Route('/import-log_polls/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogPolls'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_search_messages',
  new Route('/import-log_search_messages/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogSearchMessages'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_search_results',
  new Route('/import-log_search_results/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogSearchResults'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-log_search_subjects',
  new Route('/import-log_search_subjects/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogSearchSubjects'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));

$routes->add('import-log_search_topics',
  new Route('/import-log_search_topics/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportLogSearchTopics'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));
$routes->add('import-smileys',
  new Route('/import-smileys/{page}/{limit}', [
    '_controller' => 'Habeuk\MigrateSmf1xTo2x\Controller\ImportDatasController::ImportSmileys'
  ], [
    'page' => '[0-9]+',
    'limit' => '[0-9]+'
  ]));

//
return $routes;
