<?php

namespace Drupal\d8learning\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'CacheBlock' block.
 *
 * @Block(
 *  id = "cacheblock",
 *  admin_label = @Translation("Cache block"),
 * )
 */
class CacheBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['cacheblock']['#markup'] = 'Implement CacheBlock.';

    return $build;
  }

}
