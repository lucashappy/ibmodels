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
class ModelsViewCategory extends JView
{
    /**
     * Models view display method
     * @return void
     **/
    function display($tpl = null)
    {
  
       //get the category
		$category		=& $this->get('Data');
		$isNew		= ($category->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'Category' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::save();
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}

		
		$this->assignRef('category',		$category);

		parent::display($tpl);
    }
}
