<?php

namespace Drupal\d8learning\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Database\Driver\Mysql\Connection;
use Drupal\Core\Session\AccountProxy;

/**
 * Provides a 'cblock' block.
 *
 * @Block(
 *  id = "cblock",
 *  admin_label = @Translation("Cblock"),
 * )
 */
class cblock extends BlockBase implements ContainerFactoryPluginInterface {
   private $database;
   //private $us;

   public function __construct(
   	array $configuration, 
   	$plugin_id, 
   	$plugin_definition,
   	 Connection $database) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->database = $database;
  }
   /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('database')
      //$container->get('current_user')
    );
  }


  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    //$user = \Drupa\User\Entity::load(\Drupal::currentUser()->id());
    //$email = $user->get('mail')->value;
    //$uid = $this->us->id();
    $query = $this->database->select('node_field_data', 'n');
    $query->fields('n', array());
    //$query->conditions('uid',$uid);
    $result = $query->execute()->fetchAll();
    $rows = array();
    $tags = array();
    foreach($result as $val) {
    	$rows[] = $val->title;
    	$tags [] = 'node:'. $val->nid;  
    }
    
    //$user = User::load(\Drupal::currentUser()->id());
    //$email = $user->$this->user-id();
    $tags[] = 'node_list'; //it will update list if any node gets added.
    //$tags[] = 'user:' .email;
    $build['#theme'] = 'cblock';
    $build['#cvalue'] = $rows;
    //$build['#cache']['tags'] = $tags;
    $build['#cache']['tags'] = $tags;

    return $build;
  }

}
