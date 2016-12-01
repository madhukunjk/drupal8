<?php

namespace Drupal\d8learning;

use Drupal\Core\Database\Driver\mysql\Connection;
use Drupal\Core\Logger\LoggerChannelFactory;

/**
 * Class DefaultService.
 *
 * @package Drupal\d8learning
 */
class DefaultService implements DefaultServiceInterface {

  /**
   * Drupal\Core\Database\Driver\mysql\Connection definition.
   *
   * @var Drupal\Core\Database\Driver\mysql\Connection
   */
  protected $database;

  /**
   * Drupal\Core\Logger\LoggerChannelFactory definition.
   *
   * @var Drupal\Core\Logger\LoggerChannelFactory
   */
  protected $logger_factory;
  /**
   * Constructor.
   */
  public function __construct(Connection $database, LoggerChannelFactory $logger_factory) {
    $this->database = $database;
    $this->logger_factory = $logger_factory;
  }

}
