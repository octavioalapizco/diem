<?php

/**
 * DmTalkMessage filter form base class.
 *
 * @package    Acme
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDmTalkMessageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'room_id'       => new sfWidgetFormDoctrineChoice(array('model' => 'DmTalkRoom', 'add_empty' => true)),
      'speaker_name'  => new sfWidgetFormDmFilterInput(),
      'text'          => new sfWidgetFormDmFilterInput(),
      'to_speaker_id' => new sfWidgetFormDoctrineChoice(array('model' => 'DmTalkSpeaker', 'add_empty' => true)),
      'created_at'    => new sfWidgetFormChoice(array('choices' => array(
        ''      => '',
        'today' => $this->getI18n()->__('Today'),
        'week'  => $this->getI18n()->__('Past %number% days', array('%number%' => 7)),
        'month' => $this->getI18n()->__('This month'),
        'year'  => $this->getI18n()->__('This year')
      ))),
    ));

    $this->setValidators(array(
      'room_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Room'), 'column' => 'id')),
      'speaker_name'  => new sfValidatorPass(array('required' => false)),
      'text'          => new sfValidatorPass(array('required' => false)),
      'to_speaker_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ToSpeaker'), 'column' => 'id')),
      'created_at'    => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($this->widgetSchema['created_at']->getOption('choices')))),
    ));
    

    $this->widgetSchema->setNameFormat('dm_talk_message_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmTalkMessage';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'room_id'       => 'ForeignKey',
      'speaker_name'  => 'Text',
      'text'          => 'Text',
      'to_speaker_id' => 'ForeignKey',
      'created_at'    => 'Date',
    );
  }
}
