<?php

/**
 * DmTalkSpeaker filter form base class.
 *
 * @package    Acme
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDmTalkSpeakerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'room_id'    => new sfWidgetFormDoctrineChoice(array('model' => 'DmTalkRoom', 'add_empty' => true)),
      'code'       => new sfWidgetFormDmFilterInput(),
      'name'       => new sfWidgetFormDmFilterInput(),
      'last_ping'  => new sfWidgetFormDmFilterInput(),
      'created_at' => new sfWidgetFormChoice(array('choices' => array(
        ''      => '',
        'today' => $this->getI18n()->__('Today'),
        'week'  => $this->getI18n()->__('Past %number% days', array('%number%' => 7)),
        'month' => $this->getI18n()->__('This month'),
        'year'  => $this->getI18n()->__('This year')
      ))),
    ));

    $this->setValidators(array(
      'room_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Room'), 'column' => 'id')),
      'code'       => new sfValidatorPass(array('required' => false)),
      'name'       => new sfValidatorPass(array('required' => false)),
      'last_ping'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($this->widgetSchema['created_at']->getOption('choices')))),
    ));
    

    $this->widgetSchema->setNameFormat('dm_talk_speaker_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmTalkSpeaker';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'room_id'    => 'ForeignKey',
      'code'       => 'Text',
      'name'       => 'Text',
      'last_ping'  => 'Number',
      'created_at' => 'Date',
    );
  }
}
