<?php

/**
 * DmTalkRoom filter form base class.
 *
 * @package    Acme
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDmTalkRoomFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'       => new sfWidgetFormDmFilterInput(),
      'created_at' => new sfWidgetFormChoice(array('choices' => array(
        ''      => '',
        'today' => $this->getI18n()->__('Today'),
        'week'  => $this->getI18n()->__('Past %number% days', array('%number%' => 7)),
        'month' => $this->getI18n()->__('This month'),
        'year'  => $this->getI18n()->__('This year')
      ))),
    ));

    $this->setValidators(array(
      'code'       => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($this->widgetSchema['created_at']->getOption('choices')))),
    ));
    

    $this->widgetSchema->setNameFormat('dm_talk_room_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmTalkRoom';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'code'       => 'Text',
      'created_at' => 'Date',
    );
  }
}
