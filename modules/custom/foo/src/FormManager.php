<?php

namespace Drupal\foo;

use Drupal\Core\Database\Driver\mysql\Connection;


class FormManager {

  private $connection;

  public function _construct(Connection $connection) {
    $this->connection = $connection;
  }


  public function  fetchData() {
    $query = $this->connection->select('foo', 'd8t');
    $query->fields('d8t', array());
    $query->range(0,1);
    $result = $query->execute()->fetchAssoc();
    return $result['echo_me'];
  }


  public function  addData($val) {
    $result = $this->database->insert('foo')->fields(array('name' => $val))->execute();
    return $result;
  }

}