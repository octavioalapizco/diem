<?php

require_once 'C:/xampp/htdocs/diem-5.1.3/dmCorePlugin/lib/core/dm.php';
dm::start();

class ProjectConfiguration extends dmProjectConfiguration
{

  public function setup()
  {
    parent::setup();
    
    $this->enablePlugins(array(
      'dmWidgetTwitterPlugin',
	  'dmContactPlugin',
	  'sfFeed2Plugin',
	  'dmWidgetGalleryPlugin',
	  'dmWidgetNivoGalleryPlugin',
	  'dmCommentPlugin',
	  'dmWidgetGalleryGridPlugin',
	  'dmTalkPlugin'
    ));

    $this->setWebDir(sfConfig::get('sf_root_dir').'/web');
  }
  
}