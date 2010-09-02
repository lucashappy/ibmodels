<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );
class ModelsController extends JController
{  
  function display()
  {
    $document =& JFactory::getDocument();
    $viewName = JRequest::getVar('view', 'all');
    $viewType = $document->getType();
    $view = &$this->getView($viewName, $viewType);
    $model =& $this->getModel( $viewName, 'ModelModels' );
    if (!JError::isError( $model )) {
      $view->setModel( $model, true );
    }
    $view->setLayout('default');
    $view->display();
  }
  
}
?>