<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'messages')]
class Messages {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_ATTACH;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_THUMB;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MSG;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MEMBER;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $filename;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $size;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $downloads;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $file_hash;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $attachmentType;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $width;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $height;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'attachments';
  }
  
  protected function getColumnId() {
    return 'ID_ATTACH';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_ATTACH',
      'smf_2' => 'id_attach'
    ];
  }
  
  protected function buildRow(Messages $row) {
    return [
      'id_attach' => $row->ID_ATTACH,
      'id_thumb' => $row->ID_THUMB,
      'id_msg' => $row->ID_MSG,
      'id_member' => $row->ID_MEMBER,
      'id_folder' => 0,
      'attachment_type' => $row->attachmentType,
      'filename' => $row->filename,
      'size' => $row->size,
      'downloads' => $row->downloads,
      'file_hash' => $row->file_hash,
      'width' => $row->width,
      'height' => $row->height,
      'mime_type' => '',
      'approved' => 1
    ];
  }
}