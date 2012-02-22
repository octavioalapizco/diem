<?php

/**
 * DmTalkMessage form base class.
 *
 * @method DmTalkMessage getObject() Returns the current form's model object
 *
 * @package    Acme
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDmTalkMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'room_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'add_empty' => false)),
      'speaker_name'  => new sfWidgetFormInputText(),
      'text'          => new sfWidgetFormTextarea(),
      'to_speaker_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ToSpeaker'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'room_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Room'))),
      'speaker_name'  => new sfValidatorString(array('max_length' => 32)),
      'text'          => new sfValidatorString(array('max_length' => 64000)),
      'to_speaker_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ToSpeaker'), 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('dm_talk_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmTalkMessage';
  }

}
