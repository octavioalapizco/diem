<?php

/**
 * DmComment filter form base class.
 *
 * @package    Acme
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDmCommentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'record_model'   => new sfWidgetFormDmFilterInput(),
      'record_id'      => new sfWidgetFormDmFilterInput(),
      'author_name'    => new sfWidgetFormDmFilterInput(),
      'author_email'   => new sfWidgetFormDmFilterInput(),
      'author_website' => new sfWidgetFormDmFilterInput(),
      'body'           => new sfWidgetFormDmFilterInput(),
      'is_active'      => new sfWidgetFormChoice(array('choices' => array('' => $this->getI18n()->__('yes or no', array(), 'dm'), 1 => $this->getI18n()->__('yes', array(), 'dm'), 0 => $this->getI18n()->__('no', array(), 'dm')))),
      'created_at'     => new sfWidgetFormChoice(array('choices' => array(
        ''      => '',
        'today' => $this->getI18n()->__('Today'),
        'week'  => $this->getI18n()->__('Past %number% days', array('%number%' => 7)),
        'month' => $this->getI18n()->__('This month'),
        'year'  => $this->getI18n()->__('This year')
      ))),
      'updated_at'     => new sfWidgetFormChoice(array('choices' => array(
        ''      => '',
        'today' => $this->getI18n()->__('Today'),
        'week'  => $this->getI18n()->__('Past %number% days', array('%number%' => 7)),
        'month' => $this->getI18n()->__('This month'),
        'year'  => $this->getI18n()->__('This year')
      ))),
    ));

    $this->setValidators(array(
      'record_model'   => new sfValidatorPass(array('required' => false)),
      'record_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'author_name'    => new sfValidatorPass(array('required' => false)),
      'author_email'   => new sfValidatorPass(array('required' => false)),
      'author_website' => new sfValidatorPass(array('required' => false)),
      'body'           => new sfValidatorPass(array('required' => false)),
      'is_active'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'     => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($this->widgetSchema['created_at']->getOption('choices')))),
      'updated_at'     => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($this->widgetSchema['updated_at']->getOption('choices')))),
    ));
    

    $this->widgetSchema->setNameFormat('dm_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmComment';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'record_model'   => 'Text',
      'record_id'      => 'Number',
      'author_name'    => 'Text',
      'author_email'   => 'Text',
      'author_website' => 'Text',
      'body'           => 'Text',
      'is_active'      => 'Boolean',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
