<?php 

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );

class ModelsController extends JController
{
  function __construct( $default = array() )
  {
    parent::__construct( $default );
    $this->registerTask( 'add' , 'edit' );
    $this->registerTask( 'apply', 'save' );
    $this->registerTask( 'unpublish', 'publish' );
  }
  function edit()
  {
    global $option;
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
  $lists['editPhotos'] = 'index.php?option='.$option.'&task=editModelPhotos&cid[]='. $row->id;
    HTML_models::editModel($row, $lists, $option);
  }
  
  
  
  
  function save()
  {
    global $option;
$row =& JTable::getInstance('model', 'Table');
  if (!$row->bind(JRequest::get('post'))) 
  {
    echo "<script> alert('".$row->getError()."'); 
    window.history.go(-1); </script>\n";
    exit();
  }
  
  if (!$row->store()) 
  {
    echo "<script> alert('".$row->getError()."'); 
    window.history.go(-1); </script>\n";
    exit();
  }
 
  //Handle with models images
  $this->saveImages();
  switch ($this->_task)
  {
    case 'apply':
      $msg = 'Changes to Model Saved';
      $link = 'index.php?option=' . $option . 
         '&task=edit&cid[]='. $row->id;
      break;
    case 'save':
    default:
      $msg = 'Model Saved';
      $link = 'index.php?option=' . $option;
      break;
  }
  //$this->setRedirect( $link, $msg);
  
  }
  
  
  function showModels()
  {
    global $option, $mainframe;
    $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
    $category = $cid[0];
    
    
  $limit = JRequest::getVar('limit', 
                $mainframe->getCfg('list_limit'));
  $limitstart = JRequest::getVar('limitstart', 0);
  $db =& JFactory::getDBO();
  
  if($category == 0){
  $query = "SELECT count(*) FROM #__models";
  $db->setQuery( $query );
  $total = $db->loadResult();
  $query = "SELECT * FROM #__models";
  }
  else{
  $query = "SELECT count(*) FROM #__models WHERE category=".$category;
  $db->setQuery( $query );
  $total = $db->loadResult();
  $query = "SELECT * FROM #__models WHERE category=".$category;
  
  }
  
  
  $db->setQuery( $query, $limitstart, $limit );
  $rows = $db->loadObjectList();
  if ($db->getErrorNum()) {
    echo $db->stderr();
    return false;
  }
  jimport('joomla.html.pagination');
  $pageNav = new JPagination($total, $limitstart, $limit);
  HTML_models::showModels( $option, $rows, $pageNav );
  }

  
  
  function remove()
  {
    global $option;
    $cid = JRequest::getVar( 'cid', array(), '', 'array' );
    $db =& JFactory::getDBO(); 
   if(count($cid))
    {
      $cids = implode( ',', $cid );
      $query = "DELETE FROM #__models WHERE id IN ( $cids )";
      $db->setQuery( $query );
      if (!$db->query()) {
        echo "<script> alert('".$db->getErrorMsg()."'); window.
history.go(-1); </script>\n";
      }
    }
    $this->setRedirect( 'index.php?option=' . $option );
  }
  
function publish()
{
  global $option;
  $cid = JRequest::getVar( 'cid', array(), '', 'array' );
  if( $this->_task == 'publish')
  {
    $publish = 1;
  }
  else
  {
    $publish = 0;
  }
  $modelTable =& JTable::getInstance('model', 'Table');
  $modelTable->publish($cid, $publish);
  $this->setRedirect( 'index.php?option=' . $option );
}

  
/****************Model Photos **********/
   
  function editModelPhotos(){
  	
  
  	jimport('joomla.environment.uri' );
 
  	global $option;
    $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
    $id = $cid[0];
    
    $path = JPATH_ROOT.DS.'images'.DS.'models' . DS . $id ;
   // get the files and folders in somefolder
   $files= JFolder::files($path);
    
   $url = JURI::root().'images/models/'.$id.'/';
   $document =& JFactory::getDocument();
   	$document->addStyleSheet(JURI::root().'administrator/components/com_models/styles.css');
    HTML_models::editModelPhotos($url,$files, $option);
  	
  }
  
  
  function addPhotos(){ 
  //get the hosts name

  		global $option;
    $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
    $id = $cid[0];
 
  	HTML_models::addPhotos($id, $option);
  }
  	
  	
  	
  function removePhotos(){}
  
  
  
/***********MOdels Categories ********************/
function modelsCategories()
  {
    global $option, $mainframe;
  $limit = JRequest::getVar('limit', 
                $mainframe->getCfg('list_limit'));
  $limitstart = JRequest::getVar('limitstart', 0);
  $db =& JFactory::getDBO();
  $query = "SELECT count(*) FROM #__models_cat";
  $db->setQuery( $query );
  $total = $db->loadResult();
  $query = "SELECT * FROM #__models_cat";
  $db->setQuery( $query, $limitstart, $limit );
  $rows = $db->loadObjectList();
  if ($db->getErrorNum()) {
    echo $db->stderr();
    return false;
  }
  jimport('joomla.html.pagination');
  $pageNav = new JPagination($total, $limitstart, $limit);
  HTML_models::showCategories( $option, $rows, $pageNav );
  }
  
function editModelsCategory()
  {
 global $option;
    $row =& JTable::getInstance('category', 'Table');
    $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
    $id = $cid[0];
    $row->load($id);
    

    HTML_models::editModelsCategory($row,$option);
  	 //$this->setRedirect( 'index.php?option=' . $option .'&task=modelsCategories' );
  }
  
  
  
function saveModelsCategory()
  {
    global $option;
$row =& JTable::getInstance('category', 'Table');
  if (!$row->bind(JRequest::get('post'))) 
  {
    echo "<script> alert('".$row->getError()."'); 
    window.history.go(-1); </script>\n";
    exit();
  }
  
  if (!$row->store()) 
  {
    echo "<script> alert('".$row->getError()."'); 
    window.history.go(-1); </script>\n";
    exit();
  }

      $msg = 'Category Saved';
      $link = 'index.php?option=' . $option .'&task=modelsCategories' ;

  $this->setRedirect($link, $msg);
  
  }
  
function removeModelsCategory()
  {
    global $option;
    $cid = JRequest::getVar( 'cid', array(), '', 'array' );
    $db =& JFactory::getDBO(); 
   if(count($cid))
    {
      $cids = implode( ',', $cid );
      $query = "DELETE FROM #__models_cat WHERE id IN ( $cids )";
      $db->setQuery( $query );
      if (!$db->query()) {
        echo "<script> alert('".$db->getErrorMsg()."'); window.
history.go(-1); </script>\n";
      }
    }
    $this->setRedirect( 'index.php?option=' . $option .'&task=modelsCategories' );
  }

  function savePhotos(){
  	
  	echo "<h1>SaveImages</h1>";
  	 global $option;
    $row =& JTable::getInstance('model', 'Table');
    $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
    $id = $cid[0];
 
//import joomlas filesystem functions, we will do all the filewriting with joomlas functions,
//so if the ftp layer is on, joomla will write with that, not the apache user, which might
//not have the correct permissions
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
 
//this is the name of the field in the html form, filedata is the default name for swfupload
//so we will leave it as that
$fieldName = 'Filedata';
 
//any errors the server registered on uploading
$fileError = $_FILES[$fieldName]['error'];
if ($fileError > 0) 
{
        switch ($fileError) 
        {
        case 1:
        echo JText::_( 'FILE TO LARGE THAN PHP INI ALLOWS' );
        return;
 
        case 2:
        echo JText::_( 'FILE TO LARGE THAN HTML FORM ALLOWS' );
        return;
 
        case 3:
        echo JText::_( 'ERROR PARTIAL UPLOAD' );
        return;
 
        case 4:
        echo JText::_( 'ERROR NO FILE' );
        return;
        }
}
 
//check for filesize
$fileSize = $_FILES[$fieldName]['size'];
if($fileSize > 2000000)
{
    echo JText::_( 'FILE BIGGER THAN 2MB' );
}
 
//check the file extension is ok
$fileName = $_FILES[$fieldName]['name'];
$uploadedFileNameParts = explode('.',$fileName);
$uploadedFileExtension = array_pop($uploadedFileNameParts);
 
$validFileExts = explode(',', 'jpeg,jpg,png,gif');
 
//assume the extension is false until we know its ok
$extOk = false;
 
//go through every ok extension, if the ok extension matches the file extension (case insensitive)
//then the file extension is ok
foreach($validFileExts as $key => $value)
{
        if( preg_match("/$value/i", $uploadedFileExtension ) )
        {
                $extOk = true;
        }
}
 
if ($extOk == false) 
{
        echo JText::_( 'INVALID EXTENSION' );
        return;
}
 
//the name of the file in PHP's temp directory that we are going to move to our folder
$fileTemp = $_FILES[$fieldName]['tmp_name'];
 
//for security purposes, we will also do a getimagesize on the temp file (before we have moved it 
//to the folder) to check the MIME type of the file, and whether it has a width and height
$imageinfo = getimagesize($fileTemp);
 
//we are going to define what file extensions/MIMEs are ok, and only let these ones in (whitelisting), rather than try to scan for bad
//types, where we might miss one (whitelisting is always better than blacklisting) 
$okMIMETypes = 'image/jpeg,image/pjpeg,image/png,image/x-png,image/gif';
$validFileTypes = explode(",", $okMIMETypes);           
 
//if the temp file does not have a width or a height, or it has a non ok MIME, return
if( !is_int($imageinfo[0]) || !is_int($imageinfo[1]) ||  !in_array($imageinfo['mime'], $validFileTypes) )
{
        echo JText::_( 'INVALID FILETYPE' );
        return;
}
 
//lose any special characters in the filename
$fileName = ereg_replace("[^A-Za-z0-9.]", "-", $fileName);
 
//always use constants when making file paths, to avoid the possibilty of remote file inclusion
$uploadPath = JPATH_SITE.DS.'images'.DS.'stories'.DS.$fileName;
 
if(!JFile::upload($fileTemp, $uploadPath)) 
{
        echo JText::_( 'ERROR MOVING FILE' );
        return;
}
else
{
   // success, exit with code 0 for Mac users, otherwise they receive an IO Error
   exit(0);
  	
  }
  
}

 
}
?>