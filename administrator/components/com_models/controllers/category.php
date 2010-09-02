<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Models Gallery Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ModelsControllerCategory extends JController
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
		 JRequest::setVar( 'view', 'categories' );
		//JRequest::setVar( 'layout', 'form'  );
		//JRequest::setVar('hidemainmenu', 1);
        // Register Extra tasks
	

		parent::display();
	}
	
	function edit(){
		JRequest::setVar( 'view', 'category' );
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
		$model = $this->getModel('category');

		if ($model->store($post)) {
			$msg = JText::_( 'Category Saved!' );
		} else {
			$msg = JText::_( 'Error Saving Category' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_models&controller=category';
		$this->setRedirect($link, $msg);
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('Category');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Categories Could not be Deleted' );
		} else {
			$msg = JText::_( 'Category(ies) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_models&controller=category', $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_models&controller=category', $msg );
	}

}