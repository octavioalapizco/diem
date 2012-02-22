<?php

/**
 * DmTalkRoom form base class.
 *
 * @method DmTalkRoom getObject() Returns the current form's model object
 *
 * @package    Acme
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseDmTalkRoomForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'code'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),

    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'       => new sfValidatorString(array('max_length' => 8)),
      'created_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'DmTalkRoom', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('dm_talk_room[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
    // Unset automatic fields like 'created_at', 'updated_at', 'position'
    // override this method in your form to keep them
    parent::unsetAutoFields();
  }


  protected function doBind(array $values)
  {
    parent::doBind($values);
  }
  
  public function processValues($values)
  {
    $values = parent::processValues($values);
    return $values;
  }
  
  protected function doUpdateObject($values)
  {
    parent::doUpdateObject($values);
  }

  public function getModelName()
  {
    return 'DmTalkRoom';
  }

}