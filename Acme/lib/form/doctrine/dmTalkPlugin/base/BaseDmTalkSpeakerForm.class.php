<?php

/**
 * DmTalkSpeaker form base class.
 *
 * @method DmTalkSpeaker getObject() Returns the current form's model object
 *
 * @package    Acme
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDmTalkSpeakerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'room_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'add_empty' => false)),
      'code'       => new sfWidgetFormInputText(),
      'name'       => new sfWidgetFormInputText(),
      'last_ping'  => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'room_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Room'))),
      'code'       => new sfValidatorString(array('max_length' => 8)),
      'name'       => new sfValidatorString(array('max_length' => 32)),
      'last_ping'  => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'DmTalkSpeaker', 'column' => array('code'))),
        new sfValidatorDoctrineUnique(array('model' => 'DmTalkSpeaker', 'column' => array('name', 'room_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('dm_talk_speaker[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DmTalkSpeaker';
  }

}
