<?php

namespace Drupal\animate_css\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * General configuration form for controlling the animate_css behaviour.
 */
class AnimateCssSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
          $container->get('config.factory')
      );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'animate_css_admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['animate_css.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->configFactory->get('animate_css.settings');

    $form['animate_css_custom_settings'] = [
      '#type' => 'details',
      '#title' => $this->t('options'),
      '#open' => TRUE,
    ];
    $form['animate_css_custom_settings']['animate_css_custom_settings_library'] = [
      '#type' => 'radios',
      '#title' => $this->t('Select Attachment'),
      '#options' => [
        'cdn' => $this->t('CDN Library'),
        'local' => $this->t('Local Library'),
      ],
      '#default_value' => $config->get('settings.library'),
      '#description' => $this->t('Select Animate CSS library link.'),
      '#attributes' => [
        'id' => 'library-option',
      ],
    ];
    $form['animate_css_custom_settings']['info'] = [
      '#type' => 'item',
      '#title' => $this->t('How to Add Library manually.'),
      '#description' => $this->t('<strong>Follow Steps:-</strong><br><ul><li>Save This Configuration first.</li><li>Download this -> <a href=":anim_link">Animate Library.</a></li><li>Create folder in PROJECT_ROOT/libraries/animate</li><li>Unzip the content in that folder.</li><li>Clear site cache.</li></ul>', [':anim_link' => $config->get('settings.default_url')]),
      '#states' => [
        'visible' => [
          ':input[id="library-option"]' => ['value' => 'local'],
        ],
      ],
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $config = $this->configFactory->getEditable('animate_css.settings');
    $config
      ->set('settings.library', $form_state->getValue('animate_css_custom_settings_library'));
    $config->save();

    parent::submitForm($form, $form_state);
  }

}
