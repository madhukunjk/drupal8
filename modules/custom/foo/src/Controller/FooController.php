<?php

namespace Drupal\foo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\dblog\Logger\DbLog;
use Drupal\Core\Database\Driver\mysql\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FooController.
 *
 * @package Drupal\foo\Controller
 */
class FooController extends ControllerBase {
  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  /*public function hello() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('hello hi hjksdkls'),
    ];
  }*/

  private $database;
  
  
  public function __construct( Connection $database) {
    $this->database = $database;
  }

  public static function create(ContainerInterface $container){
    return new static (
      $container->get('database')
    );

  }

 public function hello() {
   return ('test');
 }
 
 public function hellotab() {

   
  $query = $this->database->select('node','n');
  $query->fields('n', array());
  $result = $query->execute();
  $row = array();
  /*$result->allowRowCount = TRUE;*/
  while($ty = $result->fetchAssoc()) {
    $row = array(
      'data' => array()
      );
    $row['data'][] = $ty['nid'];
    $row['data'][] = $ty['vid'];
    $row['data'][] = $ty['type'];
    $row['data'][] = $ty['langcode'];
    $rows[] = $row;
  }
  //print_r($result);die();

  $output = [
   '#theme' => 'table',
    '#rows' => $rows,
    '#header' => array('nid', 'vid', 'type', 'langcode')
  ];
  return $output;
  //return new Response($results);
  //print_r($results); die();
  //return $results;
  }
}
