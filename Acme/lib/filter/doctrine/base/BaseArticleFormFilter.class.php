<?php

/**
 * Article filter form base class.
 *
 * @package    Acme
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'image'      => new sfWidgetFormDoctrineChoice(array('model' => 'DmMedia', 'add_empty' => true)),
      'author'     => new sfWidgetFormDoctrineChoice(array('model' => 'DmUser', 'add_empty' => true)),
      'position'   => new sfWidgetFormDmFilterInput(),
    ));

    $this->setValidators(array(
      'image'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Image'), 'column' => 'id')),
      'author'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Author'), 'column' => 'id')),
      'position'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));
    
    $this->mergeI18nForm();


    $this->widgetSchema->setNameFormat('article_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Article';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'image'      => 'ForeignKey',
      'author'     => 'ForeignKey',
      'position'   => 'Number',
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
