
<?php defined('_JEXEC') or die('Restricted access'); 


?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
    <table class="adminlist">
    <thead>
        <tr>
            <th width="5">
                <?php echo JText::_( 'ID' ); ?>
            </th>
            <th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
			   <th width="100" >
                <?php echo JText::_( 'FACE' ); ?>
            </th>
            
            <th class="title">
                <?php echo JText::_( 'NAME' ); ?>
            </th>
            
        <th width="8%"><?php echo JText::_( 'AGE' )?></th>
        <th width="8%"><?php echo JText::_( 'SIZE' );?></th>
        <th width="8%"><?php echo JText::_( 'HEIGHT' );?></th>
        <th width="8%" nowrap="nowrap"><?php echo JText::_( 'Published' );?></th>
        <th width="8%"><?php echo JText::_( 'Photos' );?></th>
        </tr>            
    </thead>
    <?php
    $k = 0;
      	
  	for ($i=0, $n=count( $this->items ); $i < $n; $i++)	{

		$row = &$this->items[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$photosURL = JURI::root();
		$published = JHTML::_('grid.published', $row, $i );
	
    	$link 		= JRoute::_( 'index.php?option=com_models&controller=model&task=edit&cid[]='. $row->id .'&cat='.$this->origin);

    	
    	?>
        <tr class="<?php echo "row$k"; ?>">
            <td>
                <?php echo $row->id; ?>
            </td>
            		
			<td>
				<?php echo $checked; ?>
			</td>
			  <td>
			   <a href="<?php echo $link; ?>">
			   <img src="<?php echo  $photosURL.'images/models/'.$row->id.'/thumbs/face.jpg'?>" 
			   alt="<?php echo  $photosURL.'images/models/'.$row->id.'/thumbs/face.jpg'?>"/>                
               </a>
            </td>
            <td align="center">
             <a href="<?php echo $link; ?>">
               <h2> <?php echo $row->name; ?></h2>
                </a>
            </td>
               <td align="center">
          <?php echo $row->age; ?>
        </td>
        <td align="center">
          <?php echo $row->size; ?>
        </td>
        <td align="center">
          <?php echo $row->height; ?>
        </td>
        <td align="center">
          <?php echo $published;?>
        </td>
            <td align="center">
      
         <h2> <a href="index.php?option=com_media&task=popupUpload&folder=models/<?php echo $row->id; ?>" >Edit Model Photos</a></h2></td>
      
            </td>
        </tr>
        <?php
        $k = 1 - $k;
    }
    ?>
    </table>
</div>
 
<input type="hidden" name="option" value="com_models" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="model" />
<input type="hidden" name="cat" value="<?php echo $this->origin;?>" />

</form>
