<?php

/**
 * DmComment form base class.
 *
 * @method DmComment getObject() Returns the current form's model object
 *
 * @package    Acme
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseDmCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'record_model'   => new sfWidgetFormInputText(),
      'record_id'      => new sfWidgetFormInputText(),
      'author_name'    => new sfWidgetFormInputText(),
      'author_email'   => new sfWidgetFormInputText(),
      'author_website' => new sfWidgetFormInputText(),
      'body'           => new sfWidgetFormTextarea(),
      'is_active'      => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),

    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'record_model'   => new sfValidatorString(array('max_length' => 255)),
      'record_id'      => new sfValidatorInteger(),
      'author_name'    => new sfValidatorString(array('max_length' => 255)),
      'author_email'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'author_website' => new dmValidatorLinkUrl(array('max_length' => 255, 'required' => false)),
      'body'           => new sfValidatorString(),
      'is_active'      => new sfValidatorBoolean(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('dm_comment[%s]');

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
    return 'DmComment';
  }

}