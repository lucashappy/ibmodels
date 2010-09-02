<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class ModelModelsAll extends JModel
{
  var $_models = null;
  function getList()
  {
    if(!$this->_models)
    {
      $query = "SELECT * FROM #__models WHERE published = '1'";
      $this->_models = &$this->_getList($query, 0, 0);
    }
    return $this->_models;
  }
}
?>