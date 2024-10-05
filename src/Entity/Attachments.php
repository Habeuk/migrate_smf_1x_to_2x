<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Entité permettant de gerer les membres.
 */
#[ORM\Entity]
#[ORM\Table(name: 'attachments')]
class Attachments {
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
  
  /**
   * Permet de mettre à jour les noms des fichiers images.
   */
  public function updateNameFiles($page = 0, $limit = 100) {
    /**
     *
     * @var \Habeuk\MigrateSmf1xTo2x\Configs\QueryBuilderHelper $cQB
     */
    $cQB = DbConnection::connectionQueryBuilder('smf_v2');
    $cQB->select('value');
    $cQB->from("settings", 'dd')->where("variable  = 'attachmentUploadDir' ");
    $query = $cQB->executeQuery();
    $settings = $query->fetchOne();
    if (!empty($settings)) {
      $this->results['ignore'] = [];
      $this->results['rename'] = [];
      $Filesystem = new Filesystem();
      $paths = json_decode($settings, true);
      $path = reset($paths);
      /**
       *
       * @var \Doctrine\ORM\Tools\Pagination\Paginator $paginator
       */
      $paginator = $this->getDatas($page, $limit);
      $nbre = $paginator->count();
      $this->results['limit'] = $limit;
      $this->results['current_page'] = $page . "/" . (ceil($nbre / $limit));
      $this->results['total'] = $nbre;
      foreach ($paginator as $attachments) {
        $row = $this->buildRow($attachments);
        if (!empty($row['file_hash']))
          $this->updateFileName($row['id_attach'], $row['file_hash'], $path, $Filesystem);
      }
    }
  }
  
  /**
   *
   * @param integer $id_attach
   * @param string $file_hash
   * @param string $path
   */
  protected function updateFileName(int $id_attach, string $file_hash, string $path, Filesystem $Filesystem) {
    $old_full_path = $path . "/" . $file_hash;
    $old2_full_path = $path . "/" . $id_attach . '_' . $file_hash;
    $new_full_path = $path . "/" . $id_attach . '_' . $file_hash . '.dat';
    
    $old_path = null;
    if (file_exists($old_full_path))
      $old_path = $old_full_path;
    elseif (file_exists($old2_full_path))
      $old_path = $old2_full_path;
    
    if ($old_path) {
      if (!file_exists($new_full_path))
        $Filesystem->rename($old_path, $new_full_path);
      else {
        $Filesystem->remove($old_path);
      }
      $this->results['rename'][$id_attach] = $new_full_path;
    }
    else {
      $this->results['ignore'][$id_attach] = $old_path;
    }
  }
  
  protected function buildRow(Attachments $row) {
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