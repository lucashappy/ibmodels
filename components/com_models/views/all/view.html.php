<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');

class ModelsViewAll extends JView
{
	function display($tpl = null)
	{
		global $option;

		//Obter parâmetros de configuração
		$params = &JComponentHelper::getParams( 'com_models' );
		$category=     $params->get( 'category' ,'1');
		$gender=     $params->get( 'gender','f' );


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

		//Adicionar o css
		$document = JFactory::getDocument();
		$document->addStyleSheet(JURI::root().'components/com_models/assets/styles.css');
		$document->addScript(JURI::root().'components/com_models/assets/scripts.js');

		JHTML::_( 'behavior.mootools' );

		$this->assignRef('list', $list);
		$this->assignRef('id', JRequest::getVar('id', 0));
		$this->assignRef('backlink', $backlink);
		parent::display($tpl);
	}
}
?>