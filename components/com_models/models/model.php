<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class ModelModelsModel extends JModel
{
  var $_model = null;
  var $_comments = null;
  var $_id = null;
  function __construct()
  {
    parent::__construct();
    $id = JRequest::getVar('id', 0);
    $this->_id = $id;
  }
  function getModel()
  {
    if(!$this->_model)
    {
      $query = "SELECT * FROM #__models WHERE 
                              id = '" . $this->_id . "'";
      $this->_db->setQuery($query);
      $this->_model = $this->_db->loadObject();
      if(!$this->_model->published)
      {
        JError::raiseError( 404, "Invalid ID provided" );
      }
    }
    return $this->_model;
  }
 }
?>