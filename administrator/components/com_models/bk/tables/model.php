<?php
defined('_JEXEC') or die('Restricted access');
class TableModel extends JTable
{
  var $id = null;
  var $published = null;
  var $category = null;
  var $name = null;
  var $gender = null;
  var $age = null;
  var $size = null;
  var $height = null;
  var $weight = null;
  var $bust = null;
  var $waist = null;
  var $hips = null;
  var $shoes = null;
  var $eyes = null;
  var $hair = null;
 
  function __construct(&$db)
  {
    parent::__construct( '#__models', 'id', $db );
  }
}
?>