<?php
defined('_JEXEC') or die('Restricted access');
require_once( JPATH_COMPONENT.DS.'controller.php' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.
                         'com_models'.DS.'tables');
echo '<div class="componentheading">Models</div>';
$controller = new ModelsController();
$controller->execute( JRequest::getVar( 'task' ) );



$controller->redirect();
?>