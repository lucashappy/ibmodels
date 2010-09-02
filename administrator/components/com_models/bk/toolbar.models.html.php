<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class TOOLBAR_models {

	function _NEW() {
			JToolBarHelper::title( JText::_( 'Edit Model' ), 'generic.png' );
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel();
	}



	function _DEFAULT() {
			JToolBarHelper::title( JText::_( 'Models' ), 'generic.png' );
		JToolBarHelper::title( JText::_( 'Models' ),
'generic.png' );
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::editList();
		JToolBarHelper::deleteList();
		JToolBarHelper::addNew();
	}


}

class TOOLBAR_modelsCategory
{
	function _EDIT()
	{
		JToolBarHelper::title( JText::_( 'Models Category' ), 'generic.png' );
		JToolBarHelper::save('saveModelsCategory');
		JToolBarHelper::cancel('modelsCategories');
	}
	function _DEFAULT()
	{
		JToolBarHelper::title( JText::_( 'Models Categories' ), 'generic.png' );
		JToolBarHelper::editList('editModelsCategory');
		JToolBarHelper::deleteList('Are you sure you want to remove these categories?', 'removeModelsCategory');
		JToolBarHelper::addNew('editModelsCategory');
	}
}

class TOOLBAR_modelPhotos
{
	function _EDIT(){
		JToolBarHelper::title( JText::_( 'Edit Model Photos' ), 'generic.png' );
		JToolBarHelper::media_manager( 'models' );
		// Add an upload button and view a popup screen width 550 and height 400
$alt = "Upload";
$bar=& JToolBar::getInstance( 'toolbar' );
$bar->appendButton( 'Popup', 'upload', $alt, 'components/com_models/flashUp.php', 550, 400 );
		
		JToolBarHelper::deleteList('Are you sure you want to remove these photos?','removePhotos');

	}
function _SAVE(){
	JToolBarHelper::title( JText::_( 'Add Model Photos' ), 'generic.png' );
	JToolBarHelper::save('savePhotos');
}
function _DEFAULT()
{
	JToolBarHelper::title( JText::_( 'Models Photos' ), 'generic.png' );

}
}


?>
