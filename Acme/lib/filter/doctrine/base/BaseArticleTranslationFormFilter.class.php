<?php

/**
 * ArticleTranslation filter form base class.
 *
 * @package    Acme
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'      => new sfWidgetFormDmFilterInput(),
      'extract'    => new sfWidgetFormDmFilterInput(),
      'body'       => new sfWidgetFormDmFilterInput(),
      'is_active'  => new sfWidgetFormChoice(array('choices' => array('' => $this->getI18n()->__('yes or no', array(), 'dm'), 1 => $this->getI18n()->__('yes', array(), 'dm'), 0 => $this->getI18n()->__('no', array(), 'dm')))),
      'created_at' => new sfWidgetFormChoice(array('choices' => array(
        ''      => '',
        'today' => $this->getI18n()->__('Today'),
        'week'  => $this->getI18n()->__('Past %number% days', array('%number%' => 7)),
        'month' => $this->getI18n()->__('This month'),
        'year'  => $this->getI18n()->__('This year')
      ))),
      'updated_at' => new sfWidgetFormChoice(array('choices' => array(
        ''      => '',
        'today' => $this->getI18n()->__('Today'),
        'week'  => $this->getI18n()->__('Past %number% days', array('%number%' => 7)),
        'month' => $this->getI18n()->__('This month'),
        'year'  => $this->getI18n()->__('This year')
      ))),
      'version'    => new sfWidgetFormDmFilterInput(),
    ));

    $this->setValidators(array(
      'title'      => new sfValidatorPass(array('required' => false)),
      'extract'    => new sfValidatorPass(array('required' => false)),
      'body'       => new sfValidatorPass(array('required' => false)),
      'is_active'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($this->widgetSchema['created_at']->getOption('choices')))),
      'updated_at' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($this->widgetSchema['updated_at']->getOption('choices')))),
      'version'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));
    

    $this->widgetSchema->setNameFormat('article_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleTranslation';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'title'      => 'Text',
      'extract'    => 'Text',
      'body'       => 'Text',
      'is_active'  => 'Boolean',
      'lang'       => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'version'    => 'Number',
    );
  }
}
