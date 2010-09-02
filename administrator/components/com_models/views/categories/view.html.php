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
class ModelsViewCategories extends JView
{
    /**
     * Models view display method
     * @return void
     **/
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'Models Category Manager' ), 'generic.png' ); 
        JToolBarHelper::editListX();
        JToolBarHelper::deleteList();
        JToolBarHelper::addNewX();
 
        // Get data from the model
        $items =& $this->get('Data');
 
        $this->assignRef( 'items', $items );
 
        parent::display($tpl);
    }
}
