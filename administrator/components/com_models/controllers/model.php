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
				$this->registerTask( 'unpublish', 'publish' );
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
		$post	= JRequest::get('post');
		$model = $this->getModel('model');

		if ($model->store($post)) {
			$msg = JText::_( 'Model Saved!' );
		} else {
			$msg = JText::_( 'Error Saving Model' );
		}
		
		
		$id = JRequest::getInt('id',  0, 'POST');
		$folderPath = JPATH_ROOT. DS .'images'. DS.'models'.DS. $id;

		if(JFolder::create($folderPath)){
		JFolder::create($folderPath. DS . 'thumbs');
        $msg = $msg.' '.JText::_( 'Model Photos Folder Created' );
		}
        else
        $msg = $msg.' '.JText::_( 'Error Creating Model Photos Folder' );

	    $origin = JRequest::getInt('cat',  0, 'POST');
	
	

	    $this->fileUp($id);
	    
	    
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
	
	function fileUp($id){
		
	
	    //lida com o arquivo da foto de rosto
	 define ("MAX_SIZE","400");

 $errors=0;
 
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
        $image =$_FILES["datafile"]["name"];
 $uploadedfile = $_FILES['datafile']['tmp_name'];

  if ($image) 
  {
  $filename = stripslashes($_FILES['datafile']['name']);
        $extension = $this->getExtension($filename);
  $extension = strtolower($extension);
 if (($extension != "jpg") && ($extension != "jpeg") 

&& ($extension != "png") && ($extension != "gif")) 
  {
echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
   $size=filesize($_FILES['datafile']['tmp_name']);
 
if ($size > MAX_SIZE*1024)
{
 echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['datafile']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['datafile']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);


$newwidth1=120;
$newheight1=120;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

if($width >= $height){
	$width = $height;
}
else{
	$height = $width;
}



imagecopyresized($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 

$width,$height);


$filename1 = JPATH_SITE.DS.'images'.DS.'models'.DS.$id.DS."thumbs".DS.'face.jpg';


imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp1);
}
}
}

 
	}
function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 
 function publish()
{
//global $option;
if( $this->_task == 'publish')
{
$publish = 1;
}
else
{
$publish = 0;
}
$model = $this->getModel('model');
$model->publish($publish);
$this->setRedirect( 'index.php?option=com_models' );
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