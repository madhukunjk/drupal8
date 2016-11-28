<?php

namespace Drupal\foo\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the foo module.
 */
class FooControllerTest extends WebTestBase {
  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "foo FooController's controller functionality",
      'description' => 'Test Unit for module foo and controller FooController.',
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
   * Tests foo functionality.
   */
  public function testFooController() {
    // Check that the basic functions of module foo.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }

}
