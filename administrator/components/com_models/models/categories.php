<?php
/**
 * Category Model for Models Gallery Component
 *
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

/**
 * Category Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ModelsModelCategories extends JModel
{ /**
     * Models Categories data array
     *
     * @var array
     */
    var $_data;
	
    
	
	
	/**
	 * Get list of categories from database
	 * Enter description here ...
	 */
	function getData()
	{
		$query = ' SELECT * '
            . ' FROM #__models_cat '
        ;
        // Lets load the data if it doesn't already exist
        if (empty( $this->_data ))
        {
        
            $this->_data = $this->_getList( $query );
        }
 
        return $this->_data;
		
	}


}
