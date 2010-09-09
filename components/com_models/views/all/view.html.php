<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.application.menu');

class ModelsViewAll extends JView
{
  function display($tpl = null)
  {
    global $option;
    
    //Obter parâmetros de configuração
    $menu =& JMenu::getInstance();
//$item = $menu->getActive();
dump($Systeminfo);
//$params =& $menu->getParams(53);
//$category= $params->get('category', '1');
//$gender= $params->get('gender', 'f');

    //obter modelo e acessar dados
    $model = &$this->getModel();
    $list = $model->getList($category,$gender);
   
    for($i = 0; $i < count($list); $i++)
    {
      $row =& $list[$i];
      $row->link = JRoute::_('index.php?option=' . $option . 
                           '&id=' . $row->id  . '&view=model');
      $row->photosURL = JURI::root().'images/models/'.$row->id;
      $row->photos = $model->getModelPhotos($row->id);
    }
    
     //$backlink = JRoute::_('index.php?option=' .  $option . '&view=all' );
    //Adicionar o css
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::root().'components/com_models/assets/styles.css');
$document->addScript(JURI::root().'components/com_models/assets/scripts.js');
//$document->addScript(JURI::root().'components/com_models/assets/src/jquery-1.4.2.js');
//$document->addScript(JURI::root().'components/com_models/assets/src/galleria.js');			
//$document->addScript(JURI::root().'components/com_models/assets/src/themes/classic/galleria.classic.js');
//$document->addScript(JURI::root().'components/com_models/assets/jd.gallery.js');
//$document->addStyleSheet(JURI::root().'components/com_models/assets/jd.gallery.css');
	//Galleria.loadTheme(JURI::root().'components/com_models/assets/src/themes/classic/galleria.classic.js');

	 // Initialize Galleria
   // $('#galleria').galleria();$menu =& JMenu::getInstance();

   



JHTML::_( 'behavior.mootools' );
  
    $this->assignRef('list', $list);
     $this->assignRef('id', JRequest::getVar('id', 0));
     $this->assignRef('backlink', $backlink); 
    parent::display($tpl);
  }
}
?>