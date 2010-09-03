<?php defined( '_JEXEC' ) or die( 'Restricted access' );

$params= array('age','size','weight','bust','waist','hips','shoes','eyes','hair');
?>
<div class="oneModel"></div>
<?php 
//Shows models characteristics
echo '<h1 class="modelInfo">'.$this->model->name.'</h1><table class="modelInfo">';
foreach ($params as $key){
	echo'<tr><td align=right>'.$key.'</td><td align=center>'.$this->model->$key.'</td></tr>';

}
echo'</table>';

  $love = '{gallery}'.$this->model->id.'{/gallery}';
        $dispatcher =& JDispatcher::getInstance();
        $item->text =& $love;  
        //$item->params = clone($params);
       JPluginHelper::importPlugin('content'); 
       $dispatcher->trigger('onPrepareContent', array (& $item, & $item->params, 0));
       echo $love;

?>

