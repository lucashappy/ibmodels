<?php
/**
 * Hello Model for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license		GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

/**
 * Hello Hello Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ModelsModelModels extends JModel
{
	/**
	 * Constructor that retrieves the ID from the request
	 *
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		parent::__construct();

		$array = JRequest::getVar('cat',  0, '', 'array');
		$this->setId((int)$array[0]);
	}

	/**
	 * Method to set the Category identifier
	 *
	 * @access	public
	 * @param	int Category identifier
	 * @return	void
	 */
	function setId($id)
	{
		// Set id and wipe data
		$this->_id		= $id;
		$this->_data	= null;
	}
	
	function getId(){
		return $this->_id;
	}

	/**
	 * Method to get a Category
	 * @return object with data
	 */
	function &getData()
	{
		// Load the data
		if (!$this->_id==0 ) {
			$query = ' SELECT * FROM #__models '.
					'  WHERE category = '.$this->_id;
			 $this->_data = $this->_getList( $query );
		}
		else{
		$query = ' SELECT * FROM #__models';
			 $this->_data = $this->_getList( $query );
		}
	
		return $this->_data;
	}

}