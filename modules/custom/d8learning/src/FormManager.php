<?php

namespace Drupal\d8learning;

use Drupal\Core\Database\Driver\mysql\Connection;

/**
 * Class DefaultService.
 *
 * @package Drupal\d8learning
 */
class FormManager{

  private $connection;
  /**
   * Constructor.
   */
  public function __construct(Connection $database) {
    $this->connection = $database;
  }

  public function fetchData() {
  	$query = $this->connection->select('d8learning', 'd8');
  	$query->fields('d8', array());
  	$query->range(0,1);
  	$results = $query->execute()->fetchAssoc();
  }

  public function addData() {
  	//$this->connection->insert('d8learning')->fields(array('name' => $values))->execute();
  }

}
