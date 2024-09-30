<?php

namespace Habeuk\MigrateSmf1xTo2x\Configs;

class ParamsExample {
  
  public static function getParamDb() {
    return [
      'default' => [
        'host' => 'localhost',
        'user' => '',
        'password' => '',
        'dbname' => '',
        'prefix_table' => ''
      ],
      'smf_v2' => [
        'host' => 'localhost',
        'user' => '',
        'password' => '',
        'dbname' => '',
        'prefix_table' => ''
      ]
    ];
  }
}