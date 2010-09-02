<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
class ModelsViewAll extends JView
{
  function display($tpl = null)
  {
    global $option;
    $model = &$this->getModel();
    $list = $model->getList();
    for($i = 0; $i < count($list); $i++)
    {
      $row =& $list[$i];
      $row->link = JRoute::_('index.php?option=' . $option . 
                           '&id=' . $row->id  . '&view=model');
      $row->photosURL = JURI::root().'images/models/'.$row->id;
      $row->photos = $model->getModelPhotos($row->id);
    }
    //Adicionar o css
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::root().'components/com_models/assets/styles.css');
$document->addScript(JURI::root().'components/com_models/assets/scripts.js');
//$document->addScript(JURI::root().'components/com_models/assets/src/jquery-1.4.2.js');
$document->addScript(JURI::root().'components/com_models/assets/src/galleria.js');			
	

	//Galleria.loadTheme(JURI::root().'components/com_models/assets/src/themes/classic/galleria.classic.js');

	 // Initialize Galleria
   // $('#galleria').galleria();


JHTML::_( 'behavior.mootools' );
  
    $this->assignRef('list', $list);
    parent::display($tpl);
  }
}
?>