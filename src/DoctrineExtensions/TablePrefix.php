<?php

namespace Habeuk\MigrateSmf1xTo2x\DoctrineExtensions;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;

/**
 * Le but de ce fichier est de pouvoir injecter les prefis.
 *
 * @see https://www.doctrine-project.org/projects/doctrine-orm/en/3.2/cookbook/sql-table-prefixes.html
 *
 * @author stephane
 *        
 */
class TablePrefix {
  protected $prefix = '';
  
  public function __construct($prefix) {
    $this->prefix = (string) $prefix;
  }
  
  public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs) {
    $classMetadata = $eventArgs->getClassMetadata();
    
    if (!$classMetadata->isInheritanceTypeSingleTable() || $classMetadata->getName() === $classMetadata->rootEntityName) {
      $classMetadata->setPrimaryTable([
        'name' => $this->prefix . $classMetadata->getTableName()
      ]);
    }
    
    foreach ($classMetadata->getAssociationMappings() as $fieldName => $mapping) {
      if ($mapping['type'] == \Doctrine\ORM\Mapping\ClassMetadata::MANY_TO_MANY && $mapping['isOwningSide']) {
        $mappedTableName = $mapping['joinTable']['name'];
        $classMetadata->associationMappings[$fieldName]['joinTable']['name'] = $this->prefix . $mappedTableName;
      }
    }
  }
}