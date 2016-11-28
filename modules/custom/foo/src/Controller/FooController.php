<?php

namespace Drupal\foo\Controller;

use Drupal\Core\Controller\ControllerBase;

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
  public function hello() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('hello hi hjksdkls'),
    ];
  }

 public function hellotab() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('hello - ved how are you '),
    ];
  }
}
