<?php

namespace Drupal\foo\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\foo\QueryAccessCheck;

/**
 * Class appid.
 *
 * @package Drupal\foo\Form
 */
class appid extends ConfigFormBase {

  /**
   * Drupal\foo\QueryAccessCheck definition.
   *
   * @var Drupal\foo\QueryAccessCheck
   */
  protected $foo_query_siteid_check;
  public function __construct(
    ConfigFactoryInterface $config_factory,
      QueryAccessCheck $foo_query_siteid_check
    ) {
    parent::__construct($config_factory);
        $this->foo_query_siteid_check = $foo_query_siteid_check;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
            $container->get('foo.query_siteid_check')
    );
  }


  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'foo.appid',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'appid';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('foo.appid');
    $form['appid'] = [
      '#type' => 'textfield',
      '#title' => $this->t('AppId'),
      '#discription' => $this->t('App id form'),

    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('foo.appid')
      ->set('appid', $form_state->getValue('appid'))
      ->save();
  }

}
