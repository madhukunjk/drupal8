
<?php
namespace Drupal\foo\Controller;
use Drupal\node\Entity\NodeType;

class NodelistingPermissions {
  public function fooPermissions() {
	$types = NodeType::loadMultiple();
    $permissions = [];

    foreach ($types as $type) {
    	$title = $title->id();
    	$permissions['foo ' . $title] = array(
    		'title' => 'foo ' . $title,
    		'description' => 'Foo Foo',
    	);
    }
    return $permissions;
  }

}