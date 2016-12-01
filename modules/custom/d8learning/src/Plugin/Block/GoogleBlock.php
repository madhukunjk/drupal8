<?php

namespace Drupal\d8learning\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use AntoineAugusti\Books\Fetcher;
use GuzzleHttp\Client;

/**
 * Provides a 'GoogleBlock' block.
 *
 * @Block(
 *  id = "google_block",
 *  admin_label = @Translation("Google block"),
 * )
 */
class GoogleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['isbn_number'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('ISBN Number'),
      '#description' => $this->t('Add ISBN Number'),
      '#default_value' => isset($this->configuration['isbn_number']) ? $this->configuration['isbn_number'] : '',
      '#maxlength' => 255,
      '#size' => 64,
      '#weight' => '0',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['isbn_number'] = $form_state->getValue('isbn_number');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $client = new Client(['base_uri' => 'https://www.googleapis.com/books/v1/']);
$fetcher = new Fetcher($client);
$book = $fetcher->forISBN($this->configuration['isbn_number']);
    $build = [];
    $build['google_block_isbn_number']['#markup'] = '<p>' .  $book->title. '</p>';

    return $build;
  }

}
