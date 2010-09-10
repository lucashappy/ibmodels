<?php defined( '_JEXEC' ) or die( 'Restricted access' );


function objectToArray($d) {
	if (is_object($d)) {
		// Gets the properties of the given object
		// with get_object_vars function
		$d = get_object_vars($d);
	}

	if (is_array($d)) {
		/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
		return array_map(__FUNCTION__, $d);
	}
	else {
		// Return array
		return $d;
	}
}

/**
if($this->id >0){

$id = $this->id;
?><div id="modelInfoFundo"></div>
<div id="modelInfo">
<h1><?php echo $this->list[$id-1]->name; ?></h1>

<table id=infos>
<thead>
<tr><th></th></tr>
</thead>

<?php
$keys =array('','Tamanho','Altura','Peso','Busto','Cintura','Quadril','Calçados','Olhos','Cabelos');


	$ad = objectToArray($this->list[$id-1]);

?>
<tr ><td>Idade</td><td class='modelValue'><?php echo $ad['age']; ?></td></tr>
<tr ><td>Tamanho</td><td class='modelValue'><?php echo $ad['size']; ?></td></tr>
<tr ><td>Altura</td><td class='modelValue'><?php echo $ad['height']; ?></td></tr>
<tr ><td>Peso</td><td class='modelValue'><?php echo $ad['weight']; ?></td></tr>
<tr ><td>Busto</td><td class='modelValue'><?php echo $ad['bust']; ?></td></tr>
<tr ><td>Cintura</td><td class='modelValue'><?php echo $ad['waist']; ?></td></tr>
<tr ><td>Quadril</td><td class='modelValue'><?php echo $ad['hips']; ?></td></tr>
<tr ><td>Calçados</td><td class='modelValue'><?php echo $ad['shoes']; ?></td></tr>
<tr ><td>Olhos</td><td class='modelValue'><?php echo $ad['eyes']; ?></td></tr>
<tr ><td>Cabelos</td><td class='modelValue'><?php echo $ad['hair']; ?></td></tr>
<?php


?>
</table>
<?php

$love = '{gallery}'.$this->id.'{/gallery}';
$dispatcher =& JDispatcher::getInstance();
$item->text =& $love;
//$item->params = clone($params);
JPluginHelper::importPlugin('content');
$dispatcher->trigger('onPrepareContent', array (& $item, & $item->params, 0));
echo $love;?>
<a href="index.php?option=com_models">Fechar</a>
</div>


<?php 

}
**/
foreach($this->list as $l): ?>

<div class="faceThumb"><a href="index.php?option=com_models&view=model&id=<?php echo $l->id;?>">
<img src="<?php echo $l->photosURL.'/thumbs/face.jpg';?>" alt="<?php echo $l->name;?>" />
<h2><?php echo $l->name; ?></h2>
</a> </div><?php endforeach; ?>