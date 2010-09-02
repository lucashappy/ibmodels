<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');


/**
 * Models Gallery Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ModelsControllerModel extends JController
{
	
/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask( 'add'  , 	'edit' );
	}
	
	/**
	 * Method to display the view
	 *
	 * @access	public
	 */
	function display()
	{
		 JRequest::setVar( 'view', 'models' );
		//JRequest::setVar( 'layout', 'form'  );
		//JRequest::setVar('hidemainmenu', 1);
        // Register Extra tasks
	

		parent::display();
	}
	
	function edit(){
		JRequest::setVar( 'view', 'model' );
	//	JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);
		
		


		parent::display();
	}
	
		/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
		$model = $this->getModel('model');

		if ($model->store($post)) {
			$msg = JText::_( 'Model Saved!' );
		} else {
			$msg = JText::_( 'Error Saving Model' );
		}
		
		
		$id = JRequest::getInt('id',  0, 'POST');
		$folderPath = JPATH_ROOT. DS .'images'. DS.'models'.DS. $id;
		//dump($folderPath,'folder');
		if(JFolder::create($folderPath)){
		JFolder::create($folderPath. DS . 'thumbs');
        $msg = $msg.' '.JText::_( 'Model Photos Folder Created' );
		}
        else
        $msg = $msg.' '.JText::_( 'Error Creating Model Photos Folder' );

	    $origin = JRequest::getInt('cat',  0, 'POST');
	    		//		dumpSysinfo();
		//dump($origin,'origin');
		$redirect = 'index.php?option=com_models&cat='.$origin;
		$this->setRedirect( $redirect, $msg );
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('Model');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Models Could not be Deleted' );
		} else {
			$msg = JText::_( 'Model(s) Deleted' );
		}
	
        $origin = JRequest::getInt('cat',  0, 'POST');
		$redirect = 'index.php?option=com_models&cat='.$origin;
		$this->setRedirect( $redirect, $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$origin = JRequest::getInt('cat', 6, 'POST');
		 //				dumpSysinfo();
		//dump($origin,'origin');
		$redirect = 'index.php?option=com_models&cat='.$origin;
		$this->setRedirect( $redirect, $msg );
	}

}