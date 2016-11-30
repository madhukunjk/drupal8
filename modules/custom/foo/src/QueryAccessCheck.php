<?php
namespace Drupal\foo;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Symfony\Component\HttpFoundation\Request;

class QueryAccessCheck implements AccessInterface {
	/**
	*@inreritdoc
	*/

  public function access(Request $request) {
    $qs = $request->getQueryString();
    if ($qs) {
      return AccessResult::allowed()->cachePerPermissions();
    }
    else {
      return AccessResult::forbidden();	
    }
    
  }
}