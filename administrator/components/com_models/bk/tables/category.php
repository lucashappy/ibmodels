<?php
defined('_JEXEC') or die('Restricted access');
class TableCategory extends JTable
{
  var $id = null;
  var $name = null;

 
  function __construct(&$db)
  {
    parent::__construct( '#__models_cat', 'id', $db );
  }
}
?>