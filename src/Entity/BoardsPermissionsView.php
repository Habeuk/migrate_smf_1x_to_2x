<?php

namespace Habeuk\MigrateSmf1xTo2x\Entity;

use Doctrine\ORM\Mapping as ORM;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;
use Habeuk\MigrateSmf1xTo2x\Repositories\BaseEntity;

/**
 * Permet de creer les permissions dans la table board_permissions_view de
 * SMFV2.
 */
#[ORM\Entity]
#[ORM\Table(name: 'boards')]
class BoardsPermissionsView {
  use BaseEntity;
  /**
   * id
   */
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private $ID_BOARD;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_CAT;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $childLevel;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_PARENT;
  
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $boardOrder;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_LAST_MSG;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_MSG_UPDATED;
  /**
   * pas present dans la nouvelle version.
   */
  #[ORM\Column(type: 'integer')]
  private string $lastUpdated;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $memberGroups;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $name;
  /**
   * memberName
   */
  #[ORM\Column(type: 'text')]
  private string $description;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $numTopics;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $numPosts;
  /**
   * memberName
   */
  #[ORM\Column(type: 'string')]
  private string $countPosts;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $ID_THEME;
  /**
   * pas disponible dans la version 2x
   */
  #[ORM\Column(type: 'integer')]
  private string $permission_mode;
  /**
   * memberName
   */
  #[ORM\Column(type: 'integer')]
  private string $override_theme;
  
  /**
   *
   * @return string
   */
  protected function getTable() {
    return 'boards';
  }
  
  protected function getColumnId() {
    return 'ID_BOARD';
  }
  
  protected function getColumnIdInfo() {
    return [
      'smf_1' => 'ID_BOARD',
      'smf_2' => 'id_board'
    ];
  }
  
  /**
   * Recupere les données de l'ancienne base de données pour la nouvelle.
   */
  public function saveResultInVersion2x($page = 0, $limit = 100) {
    /**
     *
     * @var \Habeuk\MigrateSmf1xTo2x\Configs\QueryBuilderHelper $cQB
     */
    $cQB = DbConnection::connectionQueryBuilder('smf_v2');
    $table = 'board_permissions_view';
    /**
     *
     * @var \Doctrine\ORM\Tools\Pagination\Paginator $paginator
     */
    $paginator = $this->getDatas($page, $limit);
    $nbre = $paginator->count();
    $this->results['limit'] = $limit;
    $this->results['current_page'] = $page . "/" . (ceil($nbre / $limit));
    $this->results['total'] = $nbre;
    foreach ($paginator as $Membergroups) {
      $row = $this->buildRow($Membergroups);
      if (!empty($row['member_groups'])) {
        $member_groups = explode(",", $row['member_groups']);
        foreach ($member_groups as $id_group) {
          $sub_row = [
            'id_group' => $id_group,
            'id_board' => $row['id_board'],
            'deny' => 0
          ];
          $this->insertOrUpdate('id_group', $id_group, $table, $sub_row, $cQB);
        }
      }
    }
  }
  
  /**
   *
   * @param string $id_column
   * @param string $id_value
   * @param string $table
   * @param array $values
   * @param \Habeuk\MigrateSmf1xTo2x\Configs\QueryBuilderHelper $cQB
   */
  protected function insertOrUpdate($id_column, $id_value, string $table, array $values, \Habeuk\MigrateSmf1xTo2x\Configs\QueryBuilderHelper $cQB) {
    $cQB->select($id_column);
    $cQB->from($table, 'dd')->where("$id_column = :id and id_board = :id_board and deny = 0 ")->setParameter('id', $id_value)->setParameter("id_board", $values["id_board"]);
    $query = $cQB->executeQuery();
    if ($query->fetchAssociative()) {
      $cQB->update($table);
      $cQB->setUpdateValues($values);
      $cQB->where("$id_column = :$id_column and id_board = :id_board and deny = 0");
      $cQB->executeQuery();
      $this->results['update']++;
    }
    else {
      $cQB->insert($table);
      $cQB->setInsertValues($values);
      $cQB->executeQuery();
      $this->results['add']++;
    }
  }
  
  protected function buildRow(BoardsPermissionsView $row) {
    return [
      'id_board' => $row->ID_BOARD,
      'id_cat' => $row->ID_CAT,
      'child_level' => $row->childLevel,
      'id_parent' => $row->ID_PARENT,
      'board_order' => $row->boardOrder,
      'id_last_msg' => $row->ID_LAST_MSG,
      'id_msg_updated' => $row->ID_MSG_UPDATED,
      'member_groups' => $row->memberGroups,
      'id_profile' => 1,
      'name' => $row->name,
      'description' => $row->description,
      'num_topics' => $row->numTopics,
      'num_posts' => $row->numPosts,
      'count_posts' => $row->countPosts,
      'id_theme' => $row->ID_THEME,
      'override_theme' => $row->override_theme,
      'unapproved_posts' => 0,
      'redirect' => '',
      'deny_member_groups' => ''
    ];
  }
}