<?php defined( '_JEXEC' ) or die( 'Restricted access' );

$params= array('age','size','weight','bust','waist','hips','shoes','eyes','hair');
$params2= array('Idade','Tamanho','Peso','Busto/Peito','Cintura','Quadril','Sapatos','Olhos','Cabelo');
?>
<div class="oneModel"></div>
<?php 
//Shows models characteristics
echo '<h1 class="modelInfo">'.$this->model->name.'</h1><table class="modelInfo">';
$cont = 0;
foreach ($params as $key){
	echo'<tr><td align=right>'.$params2[$cont].'</td><td align=center>'.$this->model->$key.'</td></tr>';
    $cont++;
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

