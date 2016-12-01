<?php

namespace Drupal\d8learning\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\d8learning\WeatherService;

/**
 * Class WeatherBlock.
 *
 * @package Drupal\d8learning
 */
  /**
   * Provides a 'weather' block.
   *
   * @Block(
   *   id = "weather_block",
   *   admin_label = @Translation("Weather block")
   * )
   */
class WeatherBlock extends BlockBase implements ContainerFactoryPluginInterface {

  private $weather_service;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, WeatherService $weather_service) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->weather_service = $weather_service;
  }
   /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('d8learning.weather')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#default_value' => isset($config['cityname'])? $config['cityname'] : '',
    ];

    return $form;
  }

  public function build() {
    $config = $this->getConfiguration();
    $data = $this->weather_service->fetchData($config['cityname']);
    /*return array(
      '#type' => 'markup',
      '#markup' => $data['temp_min'],
    ); */

    $build = [];
    $build['#theme'] = 'weather_block';
    $build['#city_value'] = $data['wp'];
    return $build;

    

  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('cityname', $form_state->getValue('name'));
  }

}
