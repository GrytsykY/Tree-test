<?php

namespace vendor\core\base;

use vendor\core\Db;

abstract class Model
{
  protected $pdo;
  protected $table;
  protected $pk = 'id';

  public function __construct()
  {
    $this->pdo = Db::instance();
  }

  public function query($sql)
  {
    return $this->pdo->execute($sql);
  }

  public function findOne($id, $field = '')
  {
    $field = $field ?: $this->pk;
    $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
    return $this->pdo->query($sql, [$id]);
  }

  public function findAll()
  {
    $sql = "SELECT * FROM {$this->table}";
    return $this->pdo->query($sql);
  }

  public function add($title, $pid)
  {
    $sql = "INSERT INTO {$this->table} (title, pid) VALUES (:title,:pid)";
    $params = [
      ':title' => $title,
      ':pid' => $pid
    ];

    return $this->pdo->query($sql, $params);
  }

  public function edit($title, $pid, $id)
  {
    $sql = "UPDATE {$this->table} SET `title`= '$title', `pid` = '$pid' WHERE `id`='$id'";
    $params = [
      ':id' => $id,
      ':title' => $title,
      ':pid' => $pid
    ];
    return $this->pdo->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM {$this->table} WHERE `id` = ?";
    return $this->pdo->query($sql, [$id]);
  }

  public function delAll()
  {
    $sql = "TRUNCATE TABLE {$this->table}";
    return $this->pdo->query($sql);
  }

  public function errors($str){
    echo $str;
  }
}
