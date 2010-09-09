<?php defined( '_JEXEC' ) or die( 'Restricted access' );

$params= array('age','size','weight','bust','waist','hips','shoes','eyes','hair');
$params2= array('Idade','Tamanho','Peso','Busto/Peito','Cintura','Quadril','Sapatos','Olhos','Cabelo');

//Shows models characteristics
echo '<div class="modelInfo">';
echo '<h1>'.$this->model->name.'</h1><table>';
$cont = 0;
foreach ($params as $key){
	echo'<tr><td align=right>'.$params2[$cont].'</td><td align=center>'.$this->model->$key.'</td></tr>';
    $cont++;
}
echo'</table>';
echo '</div>';
  $love = '{gallery}'.$this->model->id.'{/gallery}';
        $dispatcher =& JDispatcher::getInstance();
        $item->text =& $love;  
        //$item->params = clone($params);
       JPluginHelper::importPlugin('content'); 
       $dispatcher->trigger('onPrepareContent', array (& $item, & $item->params, 0));
       echo $love;

?>

