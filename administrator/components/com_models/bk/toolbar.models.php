<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( JApplicationHelper::getPath( 'toolbar_html' ) );
switch($task)
{
	case 'edit':
	case 'add':
		TOOLBAR_models::_NEW();
		break;
	case 'modelsCategories':
	case 'saveModelsCategory':
	case 'removeModelsCategory':
		TOOLBAR_modelsCategory::_DEFAULT();
		break;
	case 'editModelsCategory':
		TOOLBAR_modelsCategory::_EDIT();
		break;
	case 'addPhotos':
		TOOLBAR_modelPhotos::_SAVE();
		break;
	case 'removePhotos':
		TOOLBAR_modelPhotos::_DEFAULT();
		break;
	case 'editModelPhotos':
		TOOLBAR_modelPhotos::_EDIT();
		break;
	default:
		TOOLBAR_models::_DEFAULT();
		break;
}
?>
