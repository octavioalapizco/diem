<?php
// auto-generated by sfSecurityConfigHandler
// date: 2012/02/22 07:06:08
$this->security = array (
  'all' => 
  array (
    'is_secure' => true,
  ),
  'new' => 
  array (
    'credentials' => 'widget_add',
  ),
  'edit' => 
  array (
    'credentials' => 
    array (
      0 => 
      array (
        0 => 'widget_edit',
        1 => 'widget_edit_fast',
      ),
    ),
  ),
  'sort' => 
  array (
    'credentials' => 'widget_edit',
  ),
  'move' => 
  array (
    'credentials' => 'widget_edit',
  ),
  'delete' => 
  array (
    'credentials' => 'widget_delete',
  ),
  'render' => 
  array (
    'is_secure' => false,
  ),
  'editrecord' => 
  array (
    'credentials' => 'record_edit_front',
  ),
  'getfull' => 
  array (
    'is_secure' => false,
  ),
);