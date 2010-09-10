<?php
//First start with information about the Plugin and yourself. For example:
/**
 * @version             $Id: Models.php versionnumber date author
 * @copyright           Copyright
 * @license             License, for example GNU/GPL
 * All other information you would like to add
 */
 
//To prevent accessing the document directly, enter this code:
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
//Now define the registerEvent and the language file. Replace 'Models' with the name of your plugin.
$mainframe->registerEvent( 'onSearch', 'plgSearchModels' );
$mainframe->registerEvent( 'onSearchAreas', 'plgSearchModelsAreas' );
 
//JPlugin::loadLanguage( 'plg_search_Models' );
 
//Then define a function to return an array of search areas. Replace 'Models' with the name of your plugin.
function &plgSearchModelsAreas()
{
        static $areas = array(
                'models' => 'Models'
        );
        return $areas;
}
 
//Then the real function has to be created. The database connection should be made. 
//The function will be closed with an } at the end of the file.
function plgSearchModels( $text, $phrase='', $ordering='', $areas=null )
{
        $db            =& JFactory::getDBO();
        $user  =& JFactory::getUser(); 
 
//If the array is not correct, return it:
        if (is_array( $areas )) {
                if (!array_intersect( $areas, array_keys( plgSearchModelsAreas() ) )) {
                        return array();
                }
        }
 
//It is time to define the parameters! First get the right plugin; 'search' (the group), 'Models'. 
$plugin =& JPluginHelper::getPlugin('search', 'Models');
 
//Then load the parameters of the plugin..
$pluginParams = new JParameter( $plugin->params );
 
//And define the parameters. For example like this..
$limit = $pluginParams->def( 'limit', 10 );
 
//Use the function trim to delete spaces in front of or at the back of the searching terms
$text = trim( $text );
 
//Return Array when nothing was filled in
if ($text == '') {
                return array();
        }
 
//After this, you have to add the database part. This will be the most difficult part, because this changes per situation.
//In the coding examples later on you will find some of the examples used by Joomla! 1.5 core Search Plugins.
//It will look something like this.
        $wheres = array();
        switch ($phrase) {
 
//search exact
                case 'exact':
                        $text          = $db->Quote( '%'.$db->getEscaped( $text, true ).'%', false );
                        $wheres2       = array();
                        $wheres2[]   = 'LOWER(a.name) LIKE '.$text;
                        $where                 = '(' . implode( ') OR (', $wheres2 ) . ')';
                        break;
 
//search all or any
                case 'all':
                case 'any':
 
//set default
                default:
                        $words         = explode( ' ', $text );
                        $wheres = array();
                        foreach ($words as $word)
                        {
                                $word          = $db->Quote( '%'.$db->getEscaped( $word, true ).'%', false );
                                $wheres2       = array();
                                $wheres2[]   = 'LOWER(a.name) LIKE '.$word;
                                $wheres[]    = implode( ' OR ', $wheres2 );
                        }
                        $where = '(' . implode( ($phrase == 'all' ? ') AND (' : ') OR ('), $wheres ) . ')';
                        break;
        }
 
//ordering of the results
        switch ( $ordering ) {
 
//alphabetic, ascending
                case 'alpha':
                        $order = 'a.name ASC';
                        break;
 
//oldest first
                case 'oldest':
 
//popular first
                case 'popular':
 
//newest first
                case 'newest':
 
//default setting: alphabetic, ascending
                default:
                        $order = 'a.name ASC';
        }
 
//replace Models
        $searchModels = JText::_( 'Models' );
 
//the database query; differs per situation! It will look something like this:
        $query = 'SELECT a.name AS title,'
        . ' a.id AS id,'
        . ' "0" AS section,'
        . ' "1" AS browsernav'
        . ' FROM #__models AS a'
        . ' WHERE ( '. $where .' )'
        . ' AND a.published = 1'
        . ' ORDER BY '. $order
        ;
 
//Set query
        $db->setQuery( $query, 0, $limit );
        $rows = $db->loadObjectList();
 
//The 'output' of the displayed link
        foreach($rows as $key => $row) {
                $rows[$key]->href = 'index.php?option=com_models&view=model&id='.$row->id;
        }
 
//Return the search results in an array
return $rows;
}
