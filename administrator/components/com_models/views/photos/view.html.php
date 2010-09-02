<?php

 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
 
jimport( 'joomla.application.component.view' );
 
/**
 * Category View
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ModelsViewPhotos extends JView
{
    /**
     * Models view display method
     * @return void
     **/
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'Model Photos  Manager' ), 'generic.png' );   
        JToolBarHelper::deleteList();
       $bar = & JToolBar::getInstance('toolbar');
		// Add an upload button
		$bar->appendButton( 'Popup', 'upload', $alt, "index.php?option=com_media&tmpl=component&task=popupUpload&folder=models", 640, 520 );
 
      
        // Get data from the model
        $items =& $this->get('Data');
       
     
     
		dump($items);
        $this->assignRef( 'files', $items->files );
        $this->assignRef( 'url', $items->url );
        
        //define se a p�gina de retorno � uma categoria ou todas as modelos
       
 
        parent::display($tpl);
    }
}
