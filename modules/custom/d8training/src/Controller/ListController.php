<?php

namespace Drupal\d8training\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use \Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class FooController.
 *
 * @package Drupal\foo\Controller
 */
class ListController extends ControllerBase {
  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function content(NodeInterface $node) {
    $data = [
      '#theme' => 'item_list',
      '#items' => array($node->get('body')->value, $node->getTitle() )
    ];

    return new JsonResponse($data);
      }
}
