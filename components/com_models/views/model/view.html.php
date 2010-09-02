<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');

class ModelsViewModel extends JView
{
  function display($tpl = null)
  {
    global $option, $mainframe;
    $model = &$this->getModel();
    $user =& JFactory::getUser();
    $model = $model->getModel();
    $pathway =& $mainframe->getPathWay();
    $backlink = JRoute::_('index.php?option=' . 
                          $option . '&view=all' );
                          
                           //Adicionar o css
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::root().'components/com_models/views/model/css/styles.css');

    $pathway->addItem($model->name, '');
    $this->assignRef('model', $model);   
    $this->assignRef('backlink', $backlink);    
    $this->assignRef('option', $option);    
    $this->assignRef('name', $user->name);    
    parent::display($tpl);
  }
}
?>