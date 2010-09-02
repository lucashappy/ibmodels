<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');


/**
 * Models Gallery Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ModelsControllerPhoto extends JController
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
		 JRequest::setVar( 'view', 'photos' );
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