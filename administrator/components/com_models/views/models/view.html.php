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
class ModelsViewModels extends JView
{
    /**
     * Models view display method
     * @return void
     **/
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'Models Manager' ), 'generic.png' );   
        JToolBarHelper::editListX();
        JToolBarHelper::deleteList();
        JToolBarHelper::addNewX();
 
        // Get data from the model
        $items =& $this->get('Data');
        $origin = $this->get('Id');
        
        $text = $origin ? JText::_( 'All' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'Model' ).': <small><small>[ ' . $text.' ]</small></small>' );
     
        $this->assignRef( 'items', $items );
        $this->assignRef( 'origin', $origin );
        
        //define se a página de retorno é uma categoria ou todas as modelos
       
 
        parent::display($tpl);
    }
}
