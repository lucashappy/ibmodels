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
class ModelsViewModel extends JView
{
	/**
	 * Models view display method
	 * @return void
	 **/
	function display($tpl = null)
	{
		//get the category
		$model		=& $this->get('Data');
		$isNew		= ($model->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'Model' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::save();
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}



		$lists = $this->get('Lists');
		$origin = JRequest::getInt('cat',  0, 'POST');
	

		$this->assignRef('lists',		$lists);
		$this->assignRef( 'items', $model );
		$this->assignRef( 'origin', $origin );


		parent::display($tpl);
	}


}
