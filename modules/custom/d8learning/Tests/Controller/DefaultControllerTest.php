<?php

namespace Drupal\d8learning\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the d8learning module.
 */
class DefaultControllerTest extends WebTestBase {
  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "d8learning DefaultController's controller functionality",
      'description' => 'Test Unit for module d8learning and controller DefaultController.',
      'group' => 'Other',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests d8learning functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module d8learning.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }

}
