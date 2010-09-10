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
class ModelsModelModel extends JModel
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

		$array = JRequest::getVar('cid',  0, '', 'array');
		$o =  JRequest::getVar('cat',  0, 'POST', 'int');
		$this->setId((int)$array[0], $o);
		
	}

	/**
	 * Method to set the Category identifier
	 *
	 * @access	public
	 * @param	int Category identifier
	 * @return	void
	 */
	function setId($id, $o)
	{
		// Set id and wipe data
		$this->_id		= $id;
		$this->_origin	= $o;
		
		$this->_data	= null;
	}
	
	function getOrigin(){
		return $this->_origin;
	}

	/**
	 * Method to get a Category
	 * @return object with data
	 */
	function &getData()
	{
		// Load the data
		if (empty( $this->_data )) {
			$query = ' SELECT * FROM #__models '.
					'  WHERE id = '.$this->_id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			$this->_data->name= null;
  $this->_data->published = 0;
  $this->_data->category = 0;
  $this->_data->gender = 0;
  $this->_data->age = 0;
  $this->_data->size = 0;
  $this->_data->height = 0;
  $this->_data->weight = 0;
  $this->_data->bust = 0;
  $this->_data->waist = 0;
  $this->_data->hips = 0;
  $this->_data->shoes = 0;
  $this->_data->eyes = 0;
  $this->_data->hair = 0;
		}
		return $this->_data;
		
		
	}
	
function getLists(){
    	
  
    $row =& JTable::getInstance('model', 'Table');
    $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
    $id = $cid[0];
    $row->load($id);
    
    
    
  $lists = array();
  $categories = array();
  
  //listar categorias
   $db =& JFactory::getDBO();
  $query = "SELECT count(*) FROM #__models_cat";
  $db->setQuery( $query );
  $total = $db->loadResult();
  $query = "SELECT * FROM #__models_cat";
   $db->setQuery( $query );
  $row2 = $db->loadObjectList();
  if ($db->getErrorNum()) {
    echo $db->stderr();
    return false;
  }
  foreach($row2 as $category){
  $categories[$category->id]=array('value' => $category->id,
           'text' => $category->name);
  	
  }
  

  $lists['models'] = JHTML::_('select.genericList',  
  $categories, 'category', 'class="inputbox" '. '', 'value', 
                                       'text', $row->category );
  
   $gender = array(
    '0' => array('value' => 'f',
           'text' => 'Female'),
    '1' => array('value' => 'm',
           'text' => 'Male')
  );
  $lists['gender'] = JHTML::_('select.genericlist',$gender,'gender', 
                            'class="inputbox" ', 'value', 
                                       'text', $row->gender);
  $lists['published'] = JHTML::_('select.booleanlist', 'published', 
                            'class="inputbox"', $row->published);
  $lists['upload'] = JHTML::_('behavior.modal');
  $lists['editPhotos'] = 'index.php?option=com_models&controller=photo&cid[]='. $row->id;
 
  return $lists;
    }

	/**
	 * Method to store a record
	 *
	 * @access	public
	 * @return	boolean	True on success
	 */
	function store()
	{	
		$row =& $this->getTable('Model');

		$data = JRequest::get( 'post' );

		
		
		// Bind the form fields to the hello table
		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// Make sure the hello record is valid
		if (!$row->check()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// Store the web link table to the database
		if (!$row->store()) {
			$this->setError( $row->getErrorMsg() );
			return false;
		}

		return true;
	}

	function publish($publish)
	{	
		

		$cid = JRequest::getVar( 'cid', array(), '', 'array' );

		
		

$row =& $this->getTable('Model');
$row->publish($cid, $publish);
		return true;
	}
	
	/**
	 * Method to delete record(s)
	 *
	 * @access	public
	 * @return	boolean	True on success
	 */
	function delete()
	{
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );

		$row =& $this->getTable('Model');

		if (count( $cids )) {
			foreach($cids as $cid) {
				if (!$row->delete( $cid )) {
					$this->setError( $row->getErrorMsg() );
					return false;
				}
			}
		}
		return true;
	}


}