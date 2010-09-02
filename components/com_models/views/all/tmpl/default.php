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



?>

<?php foreach($this->list as $l): ?>
<div class="faceThumb" >
<a href="#" onclick='showModelInfo("<?php echo implode("|", objectToArray($l));?>");'>
<?php 

?>
<img src="<?php echo $l->photosURL.'/face.jpg';?>" alt="<?php echo $l->name;?>" "/>
<?php echo $l->name; ?>
</a>

</div>

<?php endforeach; ?>
<?php foreach($this->list as $l): ?>
<div class="faceThumb" >
<a href="#" onclick='showModelInfo("<?php echo implode("|", objectToArray($l));?>");'>
<?php 

?>
<img src="<?php echo $l->photosURL.'/face.jpg';?>" alt="<?php echo $l->name;?>" />
<?php echo $l->name; ?>
</a>

</div>

<?php endforeach; ?>

<!-- Exibe informações da modelo quando clicada. Ativado via javascript -->
<div id="modelInfo">
<a href="#" onclick='hideModelInfo()'>Fechar</a>
<table id=infos>
<thead>
<tr><th></th></tr>
</thead>

<?php 
$keys =array('Idade','Tamanho','Altura','Peso','Busto','Cintura','Quadril','Calçados','Olhos','Cabelos');

echo($keys[0]);
for($j=0;$j<10;$j++){
	?>
	<tr ><td><?php echo $keys[$j];?></td><td class='modelValue'>0</td></tr>
	<?php 
}

?>


</table>

</div>
